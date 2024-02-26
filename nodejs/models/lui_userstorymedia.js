/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_userstorymedia', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    story_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    type: {
      type: DataTypes.STRING(30),
      allowNull: false,
      defaultValue: ""
    },
    filename: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    expire: {
      type: DataTypes.STRING(100),
      allowNull: true,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_userstorymedia'
  });
};
