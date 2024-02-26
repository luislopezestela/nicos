/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_hashtags', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    hash: {
      type: DataTypes.STRING(255),
      allowNull: false,
      defaultValue: ""
    },
    tag: {
      type: DataTypes.STRING(255),
      allowNull: false,
      defaultValue: ""
    },
    last_trend_time: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    trend_use_num: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    expire: {
      type: DataTypes.DATEONLY,
      allowNull: true
    }
  }, {
    sequelize,
    timestamps: false,
    tableName: 'lui_hashtags'
  });
};
