/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_forum_sections', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    section_name: {
      type: DataTypes.STRING(200),
      allowNull: false,
      defaultValue: ""
    },
    description: {
      type: DataTypes.STRING(300),
      allowNull: true,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_forum_sections'
  });
};
