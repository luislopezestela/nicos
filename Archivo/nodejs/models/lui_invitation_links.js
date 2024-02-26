/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_invitation_links', {
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
    invited_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    code: {
      type: DataTypes.STRING(300),
      allowNull: false,
      defaultValue: ""
    },
    time: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    }
  }, {
    sequelize,
    tableName: 'lui_invitation_links'
  });
};
