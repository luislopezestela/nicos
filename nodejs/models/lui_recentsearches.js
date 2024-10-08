/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_recentsearches', {
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
    search_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    search_type: {
      type: DataTypes.STRING(32),
      allowNull: false,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_recentsearches'
  });
};
