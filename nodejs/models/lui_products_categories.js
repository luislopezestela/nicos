/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_products_categories', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    lang_key: {
      type: DataTypes.STRING(160),
      allowNull: false,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_products_categories'
  });
};
