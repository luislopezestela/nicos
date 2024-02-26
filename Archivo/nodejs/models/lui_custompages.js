/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_custompages', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    page_name: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    },
    page_title: {
      type: DataTypes.STRING(200),
      allowNull: false,
      defaultValue: ""
    },
    page_content: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    page_type: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    }
  }, {
    sequelize,
    tableName: 'lui_custompages'
  });
};
