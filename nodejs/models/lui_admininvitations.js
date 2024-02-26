/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_admininvitations', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    code: {
      type: DataTypes.STRING(300),
      allowNull: false,
      defaultValue: "0"
    },
    posted: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: "0"
    }
  }, {
    sequelize,
    tableName: 'lui_admininvitations'
  });
};
