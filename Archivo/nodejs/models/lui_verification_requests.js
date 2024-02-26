/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('lui_verification_requests', {
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
    message: {
      type: DataTypes.TEXT,
      allowNull: true
    },
    user_name: {
      type: DataTypes.STRING(150),
      allowNull: false,
      defaultValue: ""
    },
    passport: {
      type: DataTypes.STRING(3000),
      allowNull: false,
      defaultValue: ""
    },
    photo: {
      type: DataTypes.STRING(3000),
      allowNull: false,
      defaultValue: ""
    },
    type: {
      type: DataTypes.STRING(32),
      allowNull: false,
      defaultValue: ""
    },
    seen: {
      type: DataTypes.INTEGER,
      allowNull: false,
      defaultValue: 0
    }
  }, {
    sequelize,
    tableName: 'lui_verification_requests'
  });
};
