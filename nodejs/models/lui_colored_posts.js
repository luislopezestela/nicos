/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_colored_posts', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    color_1: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    },
    color_2: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    },
    text_color: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    },
    image: {
      type: DataTypes.STRING(250),
      allowNull: false,
      defaultValue: ""
    },
    time: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_colored_posts'
  });
};
