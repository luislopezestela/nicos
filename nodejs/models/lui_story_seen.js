/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_story_seen', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    user_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    story_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    time: {
      type: DataTypes.STRING(20),
      allowNull: false,
      defaultValue: "0"
    }
  }, {
    sequelize,
    tableName: 'lui_story_seen'
  });
};
