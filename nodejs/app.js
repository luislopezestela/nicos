try{
    const moment = require("moment");
    var fs = require('fs');
    var express = require('express');
    var app = express();
    const path = require('path');

    let ctx = {};

    const configFile = require("./config.json")
    const { Sequelize, Op, DataTypes } = require("sequelize");
    const listeners = require('./listeners/listeners')

    let serverPort
    let server
    let io

    async function loadConfig(ctx) {
      let config = await ctx.lui_config.findAll({ raw: true })
      for (let c of config) {
        ctx.globalconfig[c.name] = c.value
      }
      ctx.globalconfig["site_url"] = configFile.site_url
      ctx.globalconfig['theme_url'] = ctx.globalconfig["site_url"] + '/datos/modulos/' + ctx.globalconfig['theme']

      var endpoint_url = ctx.globalconfig['ftp_endpoint']; 
      ctx.globalconfig['ftp_endpoint'] = endpoint_url.replace('https://', '');

      if (ctx.globalconfig["nodejs_ssl"] == 1) {
        var https = require('https');
        var options = {
          key: fs.readFileSync(path.resolve(__dirname, ctx.globalconfig["nodejs_key_path"])),
          cert: fs.readFileSync(path.resolve(__dirname, ctx.globalconfig["nodejs_cert_path"]))
        };
        serverPort = ctx.globalconfig["nodejs_ssl_port"];
        server = https.createServer(options, app);
      } else {
        serverPort = ctx.globalconfig["nodejs_port"];
        server = require('http').createServer(app);
      }

    }

    async function loadLangs(ctx) {
      let langs = await ctx.lui_langs.findAll({ raw: true })
      for (let c of langs) {
        ctx.globallangs[c.lang_key] = c.spanish
      }
    }

    async function init() {
      var sequelize = new Sequelize(configFile.sql_db_name, configFile.sql_db_user, configFile.sql_db_pass, {
        host: configFile.sql_db_host,
        dialect: "mysql",
        logging: function () {},
        pool: {
            max: 20,
            min: 0,
            idle: 10000
        }
      });



      ctx.lui_messages = require("./models/lui_messages")(sequelize, DataTypes)
      ctx.lui_userschat = require("./models/lui_userschat")(sequelize, DataTypes)
      ctx.lui_users = require("./models/lui_users")(sequelize, DataTypes)
      ctx.lui_notification = require("./models/lui_notifications")(sequelize, DataTypes)
      ctx.lui_groupchatusers = require("./models/lui_groupchatusers")(sequelize, DataTypes)
      ctx.lui_videocalls = require("./models/lui_videocalles")(sequelize, DataTypes)
      ctx.lui_audiocalls = require("./models/lui_audiocalls")(sequelize, DataTypes)
      ctx.lui_appssessions = require("./models/lui_appssessions")(sequelize, DataTypes)
      ctx.lui_langs = require("./models/lui_langs")(sequelize, DataTypes)
      ctx.lui_config = require("./models/lui_config")(sequelize, DataTypes)
      ctx.lui_blocks = require("./models/lui_blocks")(sequelize, DataTypes)
      ctx.lui_followers = require("./models/lui_followers")(sequelize, DataTypes)
      ctx.lui_hashtags = require("./models/lui_hashtags")(sequelize, DataTypes)
      ctx.lui_posts = require("./models/lui_posts")(sequelize, DataTypes)
      ctx.lui_comments = require("./models/lui_comments")(sequelize, DataTypes)
      ctx.lui_comment_replies = require("./models/lui_comment_replies")(sequelize, DataTypes)
      ctx.lui_userstory = require("./models/lui_userstory")(sequelize, DataTypes)
      ctx.lui_reactions_types = require("./models/lui_reactions_types")(sequelize, DataTypes)
      ctx.lui_reactions = require("./models/lui_reactions")(sequelize, DataTypes)
      ctx.lui_blog_reaction = require("./models/lui_blog_reaction")(sequelize, DataTypes)
      ctx.lui_mute = require("./models/lui_mute")(sequelize, DataTypes)

      ctx.globalconfig = {}
      ctx.globallangs = {}
      ctx.socketIdUserHash = {}
      ctx.userHashUserId = {}
      ctx.userIdCount = {}
      ctx.userIdChatOpen = {}
      ctx.userIdSocket = []
      ctx.userIdExtra = {}
      ctx.userIdGroupChatOpen = {}

      await loadConfig(ctx)
      await loadLangs(ctx)

    }


    async function main() {
      await init()

      app.get('/', (req, res) => {
       res.sendFile(__dirname + '/index.php');
      });
      io = require('socket.io')(server, {
        allowEIO3: true,
        cors: {
            origin: true,
            credentials: true
        },
      });
      if (ctx.globalconfig["redis"] === "Y") {
        const redisAdapter = require('socket.io-redis');
        io.adapter(redisAdapter({ host: 'localhost', port: ctx.globalconfig["redis_port"] }));
      }
      io.on('connection', async (socket, query) => {
        await listeners.registerListeners(socket, io, ctx)
      })

      server.listen(serverPort, function() {
        console.log('server up and running at %s port', serverPort);
      });
    }

    main()
} catch (e) {
  console.error(e);
}