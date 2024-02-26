module.exports = function(sequelize, DataTypes) {
                          return sequelize.define('lui_langs', {
                            id: {
                              autoIncrement: true,
                              type: DataTypes.INTEGER,
                              allowNull: false,
                              primaryKey: true
                            },
                            lang_key: {
                              type: DataTypes.STRING(160),
                              allowNull: true
                            },
                            type: {
                              type: DataTypes.STRING(100),
                              allowNull: false,
                              defaultValue: ""
                            },english: {type: DataTypes.TEXT,
                        allowNull: true
                       },italian: {type: DataTypes.TEXT,
                        allowNull: true
                       },portuguese: {type: DataTypes.TEXT,
                        allowNull: true
                       },quechua: {type: DataTypes.TEXT,
                        allowNull: true
                       },spanish: {type: DataTypes.TEXT,
                        allowNull: true
                       },quechua: {type: DataTypes.TEXT,
                        allowNull: true
                       }}, {
                            sequelize,
                            timestamps: false,
                            tableName: 'lui_langs'
                          });
                        };