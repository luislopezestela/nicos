/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_pagerating', {
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
    page_id: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    },
    valuation: {
      type: DataTypes.INTEGER,
      allowNull: true,
      defaultValue: 0
    },
    review: {
      type: DataTypes.TEXT,
      allowNull: true
    }
  }, {
    sequelize,
    tableName: 'lui_pagerating'
  });
};
