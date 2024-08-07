/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_gender', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    gender_id: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: "0"
    },
    image: {
      type: DataTypes.STRING(300),
      allowNull: false,
      defaultValue: ""
    }
  }, {
    sequelize,
    tableName: 'lui_gender'
  });
};
