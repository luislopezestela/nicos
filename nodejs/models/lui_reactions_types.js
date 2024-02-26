/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_reactions_types', {
    id: {
      autoIncrement: true,
      type: DataTypes.INTEGER,
      allowNull: false,
      primaryKey: true
    },
    name: {
      type: DataTypes.STRING(50),
      allowNull: false,
      defaultValue: ""
    },
    wowonder_icon: {
      type: DataTypes.STRING(300),
      allowNull: false,
      defaultValue: ""
    },
    sunshine_icon: {
      type: DataTypes.STRING(300),
      allowNull: false,
      defaultValue: ""
    },
    status: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 1
    }
  }, {
    sequelize,
    timestamps: false,
    tableName: 'lui_reactions_types'
  });
};
