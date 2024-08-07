<div class="container-fluid">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a>Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Configuracion</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Configuracion de pago</li>
            </ol>
        </nav>
    </div>
    <div class="alert alert-success">
      <i class="fa fa-question-circle fa-fw"></i> ¿Busca administrar divisas? <a href="<?php echo lui_LoadAdminLinkSettings('manage-currencies'); ?>">Click Aqui.</a>
    </div>
    <div class="alert alert-warning">
      <i class="fa fa-question-circle fa-fw"></i> Tenga en cuenta que solo se muestran las monedas admitidas por el proveedor de pago para cada metodo de pago.
    </div>
    <!-- Vertical Layout -->
    <div class="row">
      <div class="col-lg-6 col-md-6">

        <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Configuracion de retiro</h6>
                    <div class="affiliates-settings-alert"></div>
                    <form class="affiliates-settings" method="POST">
                        <div class="alert alert-info">
                            Los usuarios pueden enviar solicitudes de retiro a traves de cualquiera de estos metodos
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="float-left">
                            <label for="bank" class="main-label">Transferencia bancaria</label>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="bank" value="0" />
                            <input type="checkbox" name="bank" id="chck-bank" value="1" <?php echo ($wo['config']['withdrawal_payment_method']['bank'] == 1) ? 'checked': '';?>>
                            <label for="chck-bank" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="float-left">
                            <label for="p_paypal" class="main-label">Paypal</label>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="p_paypal" value="0" />
                            <input type="checkbox" name="p_paypal" id="chck-p_paypal" value="1" <?php echo ($wo['config']['withdrawal_payment_method']['paypal'] == 1) ? 'checked': '';?>>
                            <label for="chck-p_paypal" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="float-left">
                            <label for="skrill" class="main-label">Skrill</label>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="skrill" value="0" />
                            <input type="checkbox" name="skrill" id="chck-skrill" value="1" <?php echo ($wo['config']['withdrawal_payment_method']['skrill'] == 1) ? 'checked': '';?>>
                            <label for="chck-skrill" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="float-left">
                            <label for="custom" class="main-label">Metodo personalizado</label>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="custom" value="0" />
                            <input type="checkbox" name="custom" id="chck-custom" value="1" <?php echo ($wo['config']['withdrawal_payment_method']['custom'] == 1) ? 'checked': '';?> onclick="CustomName(this)">
                            <label for="chck-custom" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float <?php echo ($wo['config']['withdrawal_payment_method']['custom'] == 1) ? '': 'hidden';?> custom_name_class">
                            <div class="form-line">
                                <label class="form-label">Nombre de metodo personalizado</label>
                                <input type="text" id="custom_name" name="custom_name" class="form-control" value="<?php echo $wo['config']['custom_name']?>">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Solicitud de retiro minimo</label>
                                <input type="text" id="m_withdrawal" name="m_withdrawal" class="form-control" value="<?php echo $wo['config']['m_withdrawal']?>">
                                <small class="admin-info">Retiro minimo que los usuarios pueden solicitar.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <h6 class="card-title">Configurar el metodo de pago de PayPal<div class="pull-right mobile-hidden"><a href="https://developer.paypal.com/home" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" style="width: 100px;"></a></div></h6>
                    <form class="paypal-settings" method="POST">
                        <div class="float-left">
                            <label for="cchck-paypal" class="main-label">Metodo de pago de PayPal</label>
                            <br><small class="admin-info">Habilite PayPal para recibir pagos de anuncios y paquetes profesionales.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="paypal" value="0" />
                            <input type="checkbox" name="paypal" id="cchck-paypal" value="1" <?php echo ($wo['config']['paypal'] == 'yes') ? 'checked': '';?>>
                            <label for="cchck-paypal" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="float-left">
                            <label for="transaction_log" class="main-label">Mostrar registros de transacciones (todos los métodos de pago)</label>
                        <br><small class="admin-info">Mostrar el historial de transacciones en la pagina de configuracion del usuario.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="transaction_log" value="0" />
                            <input type="checkbox" name="transaction_log" id="chck-transaction_log" value="1" <?php echo ($wo['config']['transaction_log'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-transaction_log" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="paypal_mode">PayPal Mode</label>
                        <select class="form-control show-tick" id="paypal_mode" name="paypal_mode">
                          <option value="live" <?php echo ($wo['config']['paypal_mode'] == 'live')  ? ' selected': '';?>>Live</option>
                          <option value="sandbox" <?php echo ($wo['config']['paypal_mode'] == 'sandbox')  ? ' selected': '';?>>SandBox</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicacion, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID de cliente de PayPal</label>
                                <input type="text" id="paypal_id" name="paypal_id" class="form-control" value="<?php echo $wo['config']['paypal_id'];?>">
                                <small class="admin-info">Establezca su ID de aplicación de PayPal.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave secreta de PayPal</label>
                                <input type="text" id="paypal_secret" name="paypal_secret" class="form-control" value="<?php echo $wo['config']['paypal_secret'];?>">
                                <small class="admin-info">Configure la clave secreta de su aplicación de PayPal.</small>
                            </div>
                        </div>
                        <label for="paypal_currency">PayPal Currency</label>
                        <select class="form-control show-tick" id="paypal_currency" name="paypal_currency">
                          <option value="USD" <?php echo ($wo['config']['paypal_currency'] == 'USD')  ? ' selected': '';?>>USD</option>
                          <option value="EUR" <?php echo ($wo['config']['paypal_currency'] == 'EUR')  ? ' selected': '';?>>EUR</option>
                          <option value="AUD" <?php echo ($wo['config']['paypal_currency'] == 'AUD')  ? ' selected': '';?>>AUD</option>
                          <option value="BRL" <?php echo ($wo['config']['paypal_currency'] == 'BRL')  ? ' selected': '';?>>BRL</option>
                          <option value="CAD" <?php echo ($wo['config']['paypal_currency'] == 'CAD')  ? ' selected': '';?>>CAD</option>
                          <option value="CZK" <?php echo ($wo['config']['paypal_currency'] == 'CZK')  ? ' selected': '';?>>CZK</option>
                          <option value="DKK" <?php echo ($wo['config']['paypal_currency'] == 'DKK')  ? ' selected': '';?>>DKK</option>
                          <option value="HKD" <?php echo ($wo['config']['paypal_currency'] == 'HKD')  ? ' selected': '';?>>HKD</option>
                          <option value="HUF" <?php echo ($wo['config']['paypal_currency'] == 'HUF')  ? ' selected': '';?>>HUF</option>
                          <option value="INR" <?php echo ($wo['config']['paypal_currency'] == 'INR')  ? ' selected': '';?>>INR</option>
                          <option value="ILS" <?php echo ($wo['config']['paypal_currency'] == 'ILS')  ? ' selected': '';?>>ILS</option>
                          <option value="JPY" <?php echo ($wo['config']['paypal_currency'] == 'JPY')  ? ' selected': '';?>>JPY</option>
                          <option value="MYR" <?php echo ($wo['config']['paypal_currency'] == 'MYR')  ? ' selected': '';?>>MYR</option>
                          <option value="MXN" <?php echo ($wo['config']['paypal_currency'] == 'MXN')  ? ' selected': '';?>>MXN</option>
                          <option value="TWD" <?php echo ($wo['config']['paypal_currency'] == 'TWD')  ? ' selected': '';?>>TWD</option>
                          <option value="NZD" <?php echo ($wo['config']['paypal_currency'] == 'NZD')  ? ' selected': '';?>>NZD</option>
                          <option value="NOK" <?php echo ($wo['config']['paypal_currency'] == 'NOK')  ? ' selected': '';?>>NOK</option>
                          <option value="PHP" <?php echo ($wo['config']['paypal_currency'] == 'PHP')  ? ' selected': '';?>>PHP</option>
                          <option value="PLN" <?php echo ($wo['config']['paypal_currency'] == 'PLN')  ? ' selected': '';?>>PLN</option>
                          <option value="GBP" <?php echo ($wo['config']['paypal_currency'] == 'GBP')  ? ' selected': '';?>>GBP</option>
                          <option value="RUB" <?php echo ($wo['config']['paypal_currency'] == 'RUB')  ? ' selected': '';?>>RUB</option>
                          <option value="SGD" <?php echo ($wo['config']['paypal_currency'] == 'SGD')  ? ' selected': '';?>>SGD</option>
                          <option value="SEK" <?php echo ($wo['config']['paypal_currency'] == 'SEK')  ? ' selected': '';?>>SEK</option>
                          <option value="CHF" <?php echo ($wo['config']['paypal_currency'] == 'CHF')  ? ' selected': '';?>>CHF</option>
                          <option value="THB" <?php echo ($wo['config']['paypal_currency'] == 'THB')  ? ' selected': '';?>>THB</option>
                        </select>
                        <small class="admin-info">Establezca su moneda de PayPal, esta se usara solo en PayPal.</small>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago de Stripe (tarjetas de credito) <div class="pull-right mobile-hidden"><a href="https://stripe.com/" target="_blank"><img src="https://cdn.worldvectorlogo.com/logos/stripe-3.svg" style="width: 80px; margin-top: -5px;"></a></div></h6>
                    <form class="payment-settings" method="POST">
                        <div class="float-left">
                            <label for="credit_card" class="main-label">Metodo de pago de rayas</label>
                            <br><small class="admin-info">Habilite Stripe para recibir pagos con tarjetas de credito.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="credit_card" value="0" />
                            <input type="checkbox" name="credit_card" id="chck-credit_card" value="1" <?php echo ($wo['config']['credit_card'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-credit_card" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <div class="float-left">
                            <label for="alipay" class="main-label">Metodo de pago Alipay</label>
                            <br><small class="admin-info">Permitir pagos AliPay por Stripe.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="alipay" value="0" />
                            <input type="checkbox" name="alipay" id="chck-alipay" value="1" <?php echo ($wo['config']['alipay'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-alipay" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <label for="stripe_currency">Moneda de Stripe</label>
                        <select class="form-control show-tick" id="stripe_currency" name="stripe_currency">
                          <option value="USD" <?php echo ($wo['config']['stripe_currency'] == 'USD')  ? ' selected': '';?>>USD</option>
                          <option value="EUR" <?php echo ($wo['config']['stripe_currency'] == 'EUR')  ? ' selected': '';?>>EUR</option>
                          <option value="AUD" <?php echo ($wo['config']['stripe_currency'] == 'AUD')  ? ' selected': '';?>>AUD</option>
                          <option value="BRL" <?php echo ($wo['config']['stripe_currency'] == 'BRL')  ? ' selected': '';?>>BRL</option>
                          <option value="CAD" <?php echo ($wo['config']['stripe_currency'] == 'CAD')  ? ' selected': '';?>>CAD</option>
                          <option value="CZK" <?php echo ($wo['config']['stripe_currency'] == 'CZK')  ? ' selected': '';?>>CZK</option>
                          <option value="DKK" <?php echo ($wo['config']['stripe_currency'] == 'DKK')  ? ' selected': '';?>>DKK</option>
                          <option value="HKD" <?php echo ($wo['config']['stripe_currency'] == 'HKD')  ? ' selected': '';?>>HKD</option>
                          <option value="HUF" <?php echo ($wo['config']['stripe_currency'] == 'HUF')  ? ' selected': '';?>>HUF</option>
                          <option value="ILS" <?php echo ($wo['config']['stripe_currency'] == 'ILS')  ? ' selected': '';?>>ILS</option>
                          <option value="JPY" <?php echo ($wo['config']['stripe_currency'] == 'JPY')  ? ' selected': '';?>>JPY</option>
                          <option value="MYR" <?php echo ($wo['config']['stripe_currency'] == 'MYR')  ? ' selected': '';?>>MYR</option>
                          <option value="MXN" <?php echo ($wo['config']['stripe_currency'] == 'MXN')  ? ' selected': '';?>>MXN</option>
                          <option value="TWD" <?php echo ($wo['config']['stripe_currency'] == 'TWD')  ? ' selected': '';?>>TWD</option>
                          <option value="NZD" <?php echo ($wo['config']['stripe_currency'] == 'NZD')  ? ' selected': '';?>>NZD</option>
                          <option value="NOK" <?php echo ($wo['config']['stripe_currency'] == 'NOK')  ? ' selected': '';?>>NOK</option>
                          <option value="PHP" <?php echo ($wo['config']['stripe_currency'] == 'PHP')  ? ' selected': '';?>>PHP</option>
                          <option value="PLN" <?php echo ($wo['config']['stripe_currency'] == 'PLN')  ? ' selected': '';?>>PLN</option>
                          <option value="RUB" <?php echo ($wo['config']['stripe_currency'] == 'RUB')  ? ' selected': '';?>>RUB</option>
                          <option value="SGD" <?php echo ($wo['config']['stripe_currency'] == 'SGD')  ? ' selected': '';?>>SGD</option>
                          <option value="SEK" <?php echo ($wo['config']['stripe_currency'] == 'SEK')  ? ' selected': '';?>>SEK</option>
                          <option value="CHF" <?php echo ($wo['config']['stripe_currency'] == 'CHF')  ? ' selected': '';?>>CHF</option>
                          <option value="THB" <?php echo ($wo['config']['stripe_currency'] == 'THB')  ? ' selected': '';?>>THB</option>
                          <option value="GBP" <?php echo ($wo['config']['stripe_currency'] == 'GBP')  ? ' selected': '';?>>GBP</option>
                        </select>
                        <small class="admin-info">Establezca su moneda de Stripe, esta se usara solo en Stripe.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave secreta de la API de Stripe</label>
                                <input type="text" id="stripe_secret" name="stripe_secret" class="form-control" value="<?php echo $wo['config']['stripe_secret'];?>">
                                <small class="admin-info">Tu clave secreta de Stripe que comienza con sk_</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave publicable de Stripe </label>
                                <input type="text" id="stripe_id" name="stripe_id" class="form-control" value="<?php echo $wo['config']['stripe_id'];?>">
                                <small class="admin-info">Su clave publicable de Stripe que comienza con pk_</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago de 2 Checkout (tarjetas de credito)  <div class="pull-right mobile-hidden"><a href="https://www.2checkout.com/" target="_blank"><img src="data:image/png;base64,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" style="width: 130px; margin-top: -10px; margin-right: -5px;"></a></div></h6>
                    <form class="checkout-settings" method="POST">
                        <div class="float-left">
                            <label for="checkout_payment" class="main-label">2Checkout de Pago</label>
                            <br><small class="admin-info">Habilite 2Checkout para recibir pagos con tarjetas de credito.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="checkout_payment" value="0" />
                            <input type="checkbox" name="checkout_payment" id="chck-checkout_payment" value="1" <?php echo ($wo['config']['checkout_payment'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-checkout_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <label for="checkout_mode">Modo 2Checkout</label>
                        <select class="form-control show-tick" id="checkout_mode" name="checkout_mode">
                          <option value="live" <?php echo ($wo['config']['checkout_mode'] == 'live')  ? ' selected': '';?>>Live</option>
                          <option value="sandbox" <?php echo ($wo['config']['checkout_mode'] == 'sandbox')  ? ' selected': '';?>>SandBox</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicación, para probar use el modo SandBox.</small>

                        <label for="2checkout_currency">2Checkout Divisa</label>
                        <select class="form-control show-tick" id="2checkout_currency" name="2checkout_currency">
                          <option value="USD" <?php echo ($wo['config']['2checkout_currency'] == 'USD')  ? ' selected': '';?>>USD</option>
                          <option value="EUR" <?php echo ($wo['config']['2checkout_currency'] == 'EUR')  ? ' selected': '';?>>EUR</option>
                          <option value="AED" <?php echo ($wo['config']['2checkout_currency'] == 'AED')  ? ' selected': '';?>>AED</option>
                          <option value="AFN" <?php echo ($wo['config']['2checkout_currency'] == 'AFN')  ? ' selected': '';?>>AFN</option>
                          <option value="ALL" <?php echo ($wo['config']['2checkout_currency'] == 'ALL')  ? ' selected': '';?>>ALL</option>
                          <option value="ARS" <?php echo ($wo['config']['2checkout_currency'] == 'ARS')  ? ' selected': '';?>>ARS</option>
                          <option value="AUD" <?php echo ($wo['config']['2checkout_currency'] == 'AUD')  ? ' selected': '';?>>AUD</option>
                          <option value="AZN" <?php echo ($wo['config']['2checkout_currency'] == 'AZN')  ? ' selected': '';?>>AZN</option>
                          <option value="BBD" <?php echo ($wo['config']['2checkout_currency'] == 'BBD')  ? ' selected': '';?>>BBD</option>
                          <option value="BDT" <?php echo ($wo['config']['2checkout_currency'] == 'BDT')  ? ' selected': '';?>>BDT</option>
                          <option value="BGN" <?php echo ($wo['config']['2checkout_currency'] == 'BGN')  ? ' selected': '';?>>BGN</option>
                          <option value="BMD" <?php echo ($wo['config']['2checkout_currency'] == 'BMD')  ? ' selected': '';?>>BMD</option>
                          <option value="BND" <?php echo ($wo['config']['2checkout_currency'] == 'BND')  ? ' selected': '';?>>BND</option>
                          <option value="BOB" <?php echo ($wo['config']['2checkout_currency'] == 'BOB')  ? ' selected': '';?>>BOB</option>
                          <option value="BRL" <?php echo ($wo['config']['2checkout_currency'] == 'BRL')  ? ' selected': '';?>>BRL</option>
                          <option value="BSD" <?php echo ($wo['config']['2checkout_currency'] == 'BSD')  ? ' selected': '';?>>BSD</option>
                          <option value="BWP" <?php echo ($wo['config']['2checkout_currency'] == 'BWP')  ? ' selected': '';?>>BWP</option>
                          <option value="BYN" <?php echo ($wo['config']['2checkout_currency'] == 'BYN')  ? ' selected': '';?>>BYN</option>
                          <option value="BZD" <?php echo ($wo['config']['2checkout_currency'] == 'BZD')  ? ' selected': '';?>>BZD</option>
                          <option value="CAD" <?php echo ($wo['config']['2checkout_currency'] == 'CAD')  ? ' selected': '';?>>CAD</option>
                          <option value="CHF" <?php echo ($wo['config']['2checkout_currency'] == 'CHF')  ? ' selected': '';?>>CHF</option>
                          <option value="CLP" <?php echo ($wo['config']['2checkout_currency'] == 'CLP')  ? ' selected': '';?>>CLP</option>
                          <option value="CNY" <?php echo ($wo['config']['2checkout_currency'] == 'CNY')  ? ' selected': '';?>>CNY</option>
                          <option value="COP" <?php echo ($wo['config']['2checkout_currency'] == 'COP')  ? ' selected': '';?>>COP</option>
                          <option value="CRC" <?php echo ($wo['config']['2checkout_currency'] == 'CRC')  ? ' selected': '';?>>CRC</option>
                          <option value="CZK" <?php echo ($wo['config']['2checkout_currency'] == 'CZK')  ? ' selected': '';?>>CZK</option>
                          <option value="DKK" <?php echo ($wo['config']['2checkout_currency'] == 'DKK')  ? ' selected': '';?>>DKK</option>
                          <option value="DOP" <?php echo ($wo['config']['2checkout_currency'] == 'DOP')  ? ' selected': '';?>>DOP</option>
                          <option value="DZD" <?php echo ($wo['config']['2checkout_currency'] == 'DZD')  ? ' selected': '';?>>DZD</option>
                          <option value="EGP" <?php echo ($wo['config']['2checkout_currency'] == 'EGP')  ? ' selected': '';?>>EGP</option>
                          <option value="FJD" <?php echo ($wo['config']['2checkout_currency'] == 'FJD')  ? ' selected': '';?>>FJD</option>
                          <option value="GBP" <?php echo ($wo['config']['2checkout_currency'] == 'GBP')  ? ' selected': '';?>>GBP</option>
                          <option value="GTQ" <?php echo ($wo['config']['2checkout_currency'] == 'GTQ')  ? ' selected': '';?>>GTQ</option>
                          <option value="HKD" <?php echo ($wo['config']['2checkout_currency'] == 'HKD')  ? ' selected': '';?>>HKD</option>
                          <option value="HNL" <?php echo ($wo['config']['2checkout_currency'] == 'HNL')  ? ' selected': '';?>>HNL</option>
                          <option value="HRK" <?php echo ($wo['config']['2checkout_currency'] == 'HRK')  ? ' selected': '';?>>HRK</option>
                          <option value="HUF" <?php echo ($wo['config']['2checkout_currency'] == 'HUF')  ? ' selected': '';?>>HUF</option>
                          <option value="IDR" <?php echo ($wo['config']['2checkout_currency'] == 'IDR')  ? ' selected': '';?>>IDR</option>
                          <option value="ILS" <?php echo ($wo['config']['2checkout_currency'] == 'ILS')  ? ' selected': '';?>>ILS</option>
                          <option value="INR" <?php echo ($wo['config']['2checkout_currency'] == 'INR')  ? ' selected': '';?>>INR</option>
                          <option value="JMD" <?php echo ($wo['config']['2checkout_currency'] == 'JMD')  ? ' selected': '';?>>JMD</option>
                          <option value="JOD" <?php echo ($wo['config']['2checkout_currency'] == 'JOD')  ? ' selected': '';?>>JOD</option>
                          <option value="JPY" <?php echo ($wo['config']['2checkout_currency'] == 'JPY')  ? ' selected': '';?>>JPY</option>
                          <option value="KES" <?php echo ($wo['config']['2checkout_currency'] == 'KES')  ? ' selected': '';?>>KES</option>
                          <option value="KRW" <?php echo ($wo['config']['2checkout_currency'] == 'KRW')  ? ' selected': '';?>>KRW</option>
                          <option value="KWD" <?php echo ($wo['config']['2checkout_currency'] == 'KWD')  ? ' selected': '';?>>KWD</option>
                          <option value="KZT" <?php echo ($wo['config']['2checkout_currency'] == 'KZT')  ? ' selected': '';?>>KZT</option>
                          <option value="LAK" <?php echo ($wo['config']['2checkout_currency'] == 'LAK')  ? ' selected': '';?>>LAK</option>
                          <option value="LBP" <?php echo ($wo['config']['2checkout_currency'] == 'LBP')  ? ' selected': '';?>>LBP</option>
                          <option value="LKR" <?php echo ($wo['config']['2checkout_currency'] == 'LKR')  ? ' selected': '';?>>LKR</option>
                          <option value="LRD" <?php echo ($wo['config']['2checkout_currency'] == 'LRD')  ? ' selected': '';?>>LRD</option>
                          <option value="MAD" <?php echo ($wo['config']['2checkout_currency'] == 'MAD')  ? ' selected': '';?>>MAD</option>
                          <option value="MDL" <?php echo ($wo['config']['2checkout_currency'] == 'MDL')  ? ' selected': '';?>>MDL</option>
                          <option value="MMK" <?php echo ($wo['config']['2checkout_currency'] == 'MMK')  ? ' selected': '';?>>MMK</option>
                          <option value="MOP" <?php echo ($wo['config']['2checkout_currency'] == 'MOP')  ? ' selected': '';?>>MOP</option>
                          <option value="MRO" <?php echo ($wo['config']['2checkout_currency'] == 'MRO')  ? ' selected': '';?>>MRO</option>
                          <option value="MUR" <?php echo ($wo['config']['2checkout_currency'] == 'MUR')  ? ' selected': '';?>>MUR</option>
                          <option value="MVR" <?php echo ($wo['config']['2checkout_currency'] == 'MVR')  ? ' selected': '';?>>MVR</option>
                          <option value="MXN" <?php echo ($wo['config']['2checkout_currency'] == 'MXN')  ? ' selected': '';?>>MXN</option>
                          <option value="MYR" <?php echo ($wo['config']['2checkout_currency'] == 'MYR')  ? ' selected': '';?>>MYR</option>
                          <option value="NAD" <?php echo ($wo['config']['2checkout_currency'] == 'NAD')  ? ' selected': '';?>>NAD</option>
                          <option value="NGN" <?php echo ($wo['config']['2checkout_currency'] == 'NGN')  ? ' selected': '';?>>NGN</option>
                          <option value="NIO" <?php echo ($wo['config']['2checkout_currency'] == 'NIO')  ? ' selected': '';?>>NIO</option>
                          <option value="NOK" <?php echo ($wo['config']['2checkout_currency'] == 'NOK')  ? ' selected': '';?>>NOK</option>
                          <option value="NPR" <?php echo ($wo['config']['2checkout_currency'] == 'NPR')  ? ' selected': '';?>>NPR</option>
                          <option value="NZD" <?php echo ($wo['config']['2checkout_currency'] == 'NZD')  ? ' selected': '';?>>NZD</option>
                          <option value="OMR" <?php echo ($wo['config']['2checkout_currency'] == 'OMR')  ? ' selected': '';?>>OMR</option>
                          <option value="PEN" <?php echo ($wo['config']['2checkout_currency'] == 'PEN')  ? ' selected': '';?>>PEN</option>
                          <option value="PGK" <?php echo ($wo['config']['2checkout_currency'] == 'PGK')  ? ' selected': '';?>>PGK</option>
                          <option value="PHP" <?php echo ($wo['config']['2checkout_currency'] == 'PHP')  ? ' selected': '';?>>PHP</option>
                          <option value="PKR" <?php echo ($wo['config']['2checkout_currency'] == 'PKR')  ? ' selected': '';?>>PKR</option>
                          <option value="PLN" <?php echo ($wo['config']['2checkout_currency'] == 'PLN')  ? ' selected': '';?>>PLN</option>
                          <option value="PYG" <?php echo ($wo['config']['2checkout_currency'] == 'PYG')  ? ' selected': '';?>>PYG</option>
                          <option value="QAR" <?php echo ($wo['config']['2checkout_currency'] == 'QAR')  ? ' selected': '';?>>QAR</option>
                          <option value="RON" <?php echo ($wo['config']['2checkout_currency'] == 'RON')  ? ' selected': '';?>>RON</option>
                          <option value="RSD" <?php echo ($wo['config']['2checkout_currency'] == 'RSD')  ? ' selected': '';?>>RSD</option>
                          <option value="RUB" <?php echo ($wo['config']['2checkout_currency'] == 'RUB')  ? ' selected': '';?>>RUB</option>
                          <option value="SAR" <?php echo ($wo['config']['2checkout_currency'] == 'SAR')  ? ' selected': '';?>>SAR</option>
                          <option value="SBD" <?php echo ($wo['config']['2checkout_currency'] == 'SBD')  ? ' selected': '';?>>SBD</option>
                          <option value="SCR" <?php echo ($wo['config']['2checkout_currency'] == 'SCR')  ? ' selected': '';?>>SCR</option>
                          <option value="SEK" <?php echo ($wo['config']['2checkout_currency'] == 'SEK')  ? ' selected': '';?>>SEK</option>
                          <option value="SGD" <?php echo ($wo['config']['2checkout_currency'] == 'SGD')  ? ' selected': '';?>>SGD</option>
                          <option value="SYP" <?php echo ($wo['config']['2checkout_currency'] == 'SYP')  ? ' selected': '';?>>SYP</option>
                          <option value="THB" <?php echo ($wo['config']['2checkout_currency'] == 'THB')  ? ' selected': '';?>>THB</option>
                          <option value="TND" <?php echo ($wo['config']['2checkout_currency'] == 'TND')  ? ' selected': '';?>>TND</option>
                          <option value="TOP" <?php echo ($wo['config']['2checkout_currency'] == 'TOP')  ? ' selected': '';?>>TOP</option>
                          <option value="TRY" <?php echo ($wo['config']['2checkout_currency'] == 'TRY')  ? ' selected': '';?>>TRY</option>
                          <option value="TTD" <?php echo ($wo['config']['2checkout_currency'] == 'TTD')  ? ' selected': '';?>>TTD</option>
                          <option value="TWD" <?php echo ($wo['config']['2checkout_currency'] == 'TWD')  ? ' selected': '';?>>TWD</option>
                          <option value="UAH" <?php echo ($wo['config']['2checkout_currency'] == 'UAH')  ? ' selected': '';?>>UAH</option>
                          <option value="UYU" <?php echo ($wo['config']['2checkout_currency'] == 'UYU')  ? ' selected': '';?>>UYU</option>
                          <option value="VND" <?php echo ($wo['config']['2checkout_currency'] == 'VND')  ? ' selected': '';?>>VND</option>
                          <option value="VUV" <?php echo ($wo['config']['2checkout_currency'] == 'VUV')  ? ' selected': '';?>>VUV</option>
                          <option value="WST" <?php echo ($wo['config']['2checkout_currency'] == 'WST')  ? ' selected': '';?>>WST</option>
                          <option value="XCD" <?php echo ($wo['config']['2checkout_currency'] == 'XCD')  ? ' selected': '';?>>XCD</option>
                          <option value="XOF" <?php echo ($wo['config']['2checkout_currency'] == 'XOF')  ? ' selected': '';?>>XOF</option>
                          <option value="YER" <?php echo ($wo['config']['2checkout_currency'] == 'YER')  ? ' selected': '';?>>YER</option>
                          <option value="ZAR" <?php echo ($wo['config']['2checkout_currency'] == 'ZAR')  ? ' selected': '';?>>ZAR</option>
                        </select>
                        <small class="admin-info">Establezca su moneda de 2checkout, esta se usara solo en 2checkout.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Identificacion del vendedor</label>
                                <input type="text" id="checkout_seller_id" name="checkout_seller_id" class="form-control" value="<?php echo $wo['config']['checkout_seller_id'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave publicable</label>
                                <input type="text" id="checkout_publishable_key" name="checkout_publishable_key" class="form-control" value="<?php echo $wo['config']['checkout_publishable_key'];?>">
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Llave privada</label>
                                <input type="text" id="checkout_private_key" name="checkout_private_key" class="form-control" value="<?php echo $wo['config']['checkout_private_key'];?>">
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago CashFree (tarjetas de credito)</h6>
                    <form class="cashfree-settings" method="POST">
                        <div class="float-left">
                            <label for="cashfree_payment" class="main-label">Metodo de pago CashFree</label>
                            <br><small class="admin-info">Habilite CashFree para recibir pagos con tarjetas de credito.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="cashfree_payment" value="0" />
                            <input type="checkbox" name="cashfree_payment" id="chck-cashfree_payment" value="1" <?php echo ($wo['config']['cashfree_payment'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-cashfree_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <label for="cashfree_mode">CashFree Mode</label>
                        <select class="form-control show-tick" id="cashfree_mode" name="cashfree_mode">
                          <option value="live" <?php echo ($wo['config']['cashfree_mode'] == 'live')  ? ' selected': '';?>>Live</option>
                          <option value="sandbox" <?php echo ($wo['config']['cashfree_mode'] == 'sandbox')  ? ' selected': '';?>>SandBox</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicacion, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Identificacion del cliente</label>
                                <input type="text" id="cashfree_client_key" name="cashfree_client_key" class="form-control" value="<?php echo $wo['config']['cashfree_client_key'];?>">
                                <small class="admin-info">Su ID de cliente de la aplicacion.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave secreta de cliente</label>
                                <input type="text" id="cashfree_secret_key" name="cashfree_secret_key" class="form-control" value="<?php echo $wo['config']['cashfree_secret_key'];?>">
                                <small class="admin-info">Su clave secreta de ID de cliente de aplicación.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Pago Coinbase</h6>
                    <form class="coinbase_payment-settings" method="POST">
                        <div class="float-left">
                            <label for="coinbase_payment" class="main-label">Metodo de pago Coinbase</label>
                            <br><small class="admin-info">Reciba pagos con Coinbase, simple y facil.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="coinbase_payment" value="0" />
                            <input type="checkbox" name="coinbase_payment" id="chck-coinbase_payment" value="1" <?php echo ($wo['config']['coinbase_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-coinbase_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave API </label>
                                <input type="text" id="coinbase_key" name="coinbase_key" class="form-control" value="<?php echo $wo['config']['coinbase_key'];?>">
                                <small class="admin-info">Su clave API de Coinbase.</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">pago de iyzipay</h6>
                    <div class="iyzipay-settings-alert"></div>
                    <form class="iyzipay-settings" method="POST">
                        <div>
                            <div class="float-left">
                                <label for="iyzipay_payment" class="main-label">Metodo de pago Iyzipay</label>
                                <br><small class="admin-info">Habilite Iyzipay para recibir pagos con tarjetas de credito.</small>
                            </div>
                            <div class="form-group float-right switcher">
                                <input type="hidden" name="iyzipay_payment" value="0">
                                <input type="checkbox" name="iyzipay_payment" id="iyzipay_payment-enabled" value="1" <?php echo ($wo['config']['iyzipay_payment'] == '1') ? 'checked': '';?>>
                                <label for="iyzipay_payment-enabled" class="check-trail"><span class="check-handler"></span></label>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>

                        <label for="iyzipay_mode">Modo Iyzipay</label>
                        <select class="form-control show-tick" id="iyzipay_mode" name="iyzipay_mode">
                          <option value="0" <?php echo ($wo['config']['iyzipay_mode'] == '0') ? 'selected': '';?>>Live</option>
                          <option value="1" <?php echo ($wo['config']['iyzipay_mode'] == '1') ? 'selected': '';?>>SandBox</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicacion, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>

                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave Iyzipay</label>
                                <input type="text" id="iyzipay_key" name="iyzipay_key" class="form-control" value="<?php echo $wo['config']['iyzipay_key'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Clave secreta de Iyzipay</label>
                                <input type="text" id="iyzipay_secret_key" name="iyzipay_secret_key" class="form-control" value="<?php echo $wo['config']['iyzipay_secret_key'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">ID de comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_buyer_id" name="iyzipay_buyer_id" class="form-control" value="<?php echo $wo['config']['iyzipay_buyer_id'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Nombre del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_buyer_name" name="iyzipay_buyer_name" class="form-control" value="<?php echo $wo['config']['iyzipay_buyer_name'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Apellido del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_buyer_surname" name="iyzipay_buyer_surname" class="form-control" value="<?php echo $wo['config']['iyzipay_buyer_surname'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Comprador Iyzipay Numero  (+51982)</label>
                                <input type="text" id="iyzipay_buyer_gsm_number" name="iyzipay_buyer_gsm_number" class="form-control" value="<?php echo $wo['config']['iyzipay_buyer_gsm_number'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Correo electrónico del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_buyer_email" name="iyzipay_buyer_email" class="form-control" value="<?php echo $wo['config']['iyzipay_buyer_email'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Número de identidad del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_identity_number" name="iyzipay_identity_number" class="form-control" value="<?php echo $wo['config']['iyzipay_identity_number'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Direccion del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_address" name="iyzipay_address" class="form-control" value="<?php echo $wo['config']['iyzipay_address'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Ciudad del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_city" name="iyzipay_city" class="form-control" value="<?php echo $wo['config']['iyzipay_city'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Pais del comprador de Iyzipay</label>
                                <input type="text" id="iyzipay_country" name="iyzipay_country" class="form-control" value="<?php echo $wo['config']['iyzipay_country'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <label class="form-label">Comprador Iyzipay Zip</label>
                                <input type="text" id="iyzipay_zip" name="iyzipay_zip" class="form-control" value="<?php echo $wo['config']['iyzipay_zip'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el método de pago de Fortumo</h6>
                    <form class="fortumo-settings" method="POST">
                        <div class="float-left">
                            <label for="fortumo_payment" class="main-label">Metodo de pago Fortumo</label>
                            <br><small class="admin-info">Reciba pagos del proveedor de pagos de Fortumo.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="fortumo_payment" value="0" />
                            <input type="checkbox" name="fortumo_payment" id="chck-fortumo_payment" value="1" <?php echo ($wo['config']['fortumo_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-fortumo_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">ID de servicio de Fortumo</label>
                                <input type="text" id="fortumo_service_id" name="fortumo_service_id" class="form-control" value="<?php echo $wo['config']['fortumo_service_id'];?>">
                                <small class="admin-info">Su ID de servicio de Fortumo.</small>
                            </div>
                        </div>
                        <small class="admin-info">Por favor agregue esta URL <?php echo($wo['config']['site_url'] . "/requests.php?f=fortumo&s=success_fortumo") ?> <a href="https://dashboard.fortumo.com/services" target="_blank">en URL reenviada</a></small>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el método de pago de Aamarpayd</h6>
                    <form class="aamarpay-settings" method="POST">
                        <div class="float-left">
                            <label for="aamarpay_payment" class="main-label">Metodo de pago Aamarpay</label>
                            <br><small class="admin-info">Reciba pagos del proveedor de pago Aamarpay.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="aamarpay_payment" value="0" />
                            <input type="checkbox" name="aamarpay_payment" id="chck-aamarpay_payment" value="1" <?php echo ($wo['config']['aamarpay_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-aamarpay_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <label for="aamarpay_mode">Modo de prueba</label>
                        <select class="form-control show-tick" id="aamarpay_mode" name="aamarpay_mode">
                          <option value="live" <?php echo ($wo['config']['aamarpay_mode'] == 'live') ? 'selected': '';?>>Live</option>
                          <option value="sandbox" <?php echo ($wo['config']['aamarpay_mode'] == 'sandbox') ? 'selected': '';?>>Test</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicación, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Identificacion de la tienda Aamarpay</label>
                                <input type="text" id="aamarpay_store_id" name="aamarpay_store_id" class="form-control" value="<?php echo $wo['config']['aamarpay_store_id'];?>">
                                <small class="admin-info">Su identificacion de la tienda Aamarpay.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave de firma de Aamarpay</label>
                                <input type="text" id="aamarpay_signature_key" name="aamarpay_signature_key" class="form-control" value="<?php echo $wo['config']['aamarpay_signature_key'];?>">
                                <small class="admin-info">Su clave de firma de Aamarpay.</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago de CoinPayments <div class="pull-right mobile-hidden"><a href="https://www.coinpayments.net/" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/46/Bitcoin.svg/1200px-Bitcoin.svg.png" style="width: 40px; margin-top: -10px"></a></div></h6>
                    <form class="bitcoin-settings" method="POST">
                        <div class="float-left">
                            <label for="bitcoin" class="main-label">Metodo de pago CoinPayments</label>
                            <br><small class="admin-info">Reciba pagos con bitcoin, simple y fácil.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="bitcoin" value="0" />
                            <input type="checkbox" name="bitcoin" id="chck-bitcoin" value="1" <?php echo ($wo['config']['bitcoin'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-bitcoin" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Llave secreta </label>
                                <input type="text" id="coinpayments_secret" name="coinpayments_secret" class="form-control" value="<?php echo $wo['config']['coinpayments_secret'];?>">
                                <small class="admin-info">Su clave secreta de CoinPayments.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Llave publica</label>
                                <input type="text" id="coinpayments_public_key" name="coinpayments_public_key" class="form-control" value="<?php echo $wo['config']['coinpayments_public_key'];?>">
                                <small class="admin-info">Su clave publica de CoinPayments.</small>
                            </div>
                        </div>
                        <?php if (!empty($wo['config']['coinpayments_coins'])) {
                            $coinpayments_coins = json_decode($wo['config']['coinpayments_coins'],true);
                            if (!empty($coinpayments_coins)) { ?>
                                <label for="coinpayments_coin">Coinpagos Monedas</label>
                                <select class="form-control show-tick" id="coinpayments_coin" name="coinpayments_coin">
                                    <?php foreach ($coinpayments_coins as $key => $value) { ?>
                                        <option value="<?php echo($key); ?>" <?php echo ($wo['config']['coinpayments_coin'] == $key)  ? ' selected': '';?>><?php echo($key); ?></option>
                                    <?php } ?>
                                </select>
                                <small class="admin-info">Establezca su moneda de Coinpagos, esta se usará solo en Coinpagos.</small>
                                <div class="clearfix"></div>
                        <?php }} ?>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                        <div class="coinpayments-settings-alert"></div>
                        <button type="button" class="btn btn-success m-t-15 waves-effect" onclick="GetSupportedCoins()">Get Supported Coins</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago del banco local<div class="pull-right mobile-hidden"><img src="https://cdn.iconscout.com/icon/free/png-256/bank-240-155096.png" style="width: 60px; margin-top: -20px; margin-right: -8px;"></div></h6>
                    <form class="bank-settings" method="POST">
                      <div class="float-left">
                            <label for="bank_payment" class="main-label">Metodo de pago bancario</label>
                            <br><small class="admin-info">Reciba pagos por transferencias bancarias.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="bank_payment" value="0" />
                            <input type="checkbox" name="bank_payment" id="chck-bank_payment" value="1" <?php echo ($wo['config']['bank_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-bank_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                              <label class="form-label">Codigo de descripcion del banco</label>
                                <textarea name="bank_description" id="bank_description" class="form-control" cols="30" rows="5" style="height: 380px"><?php echo $wo['config']['bank_description'];?>
                                </textarea>
                                <small class="admin-info">Configure su codigo IBAN, SWIFT del codigo anterior.</small>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line focused">
                              <label class="form-label">Nota de transferencia bancaria</label>
                                <textarea name="bank_transfer_note" id="bank_transfer_note" class="form-control" cols="30" rows="5"><?php echo $wo['config']['bank_transfer_note'];?></textarea>
                                <small class="admin-info">Su nota al cliente despues de que envie el pago.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el método de pago de PayStack (tarjetas de crédito)</h6>
                    <form class="paystack-settings" method="POST">
                        <div class="float-left">
                            <label for="paystack_payment" class="main-label">Metodo de pago de pila de pago</label>
                            <br><small class="admin-info">Reciba el pago del proveedor de pago de Paystack.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="paystack_payment" value="0" />
                            <input type="checkbox" name="paystack_payment" id="chck-paystack_payment" value="1" <?php echo ($wo['config']['paystack_payment'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-paystack_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Llave secreta</label>
                                <input type="text" id="paystack_secret_key" name="paystack_secret_key" class="form-control" value="<?php echo $wo['config']['paystack_secret_key'];?>">
                                <small class="admin-info">La clave secreta de su cuenta paystack.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago de RazorPay (tarjetas de credito)</h6>
                    <form class="razorpay-settings" method="POST">
                        <div class="float-left">
                            <label for="razorpay_payment" class="main-label">Metodo de pago RazorPay</label>
                            <br><small class="admin-info">Reciba pagos del proveedor de pago RazorPay.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="razorpay_payment" value="0" />
                            <input type="checkbox" name="razorpay_payment" id="chck-razorpay_payment" value="1" <?php echo ($wo['config']['razorpay_payment'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-razorpay_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">ID de aplicacion</label>
                                <input type="text" id="razorpay_key_id" name="razorpay_key_id" class="form-control" value="<?php echo $wo['config']['razorpay_key_id'];?>">
                                <small class="admin-info">Su ID de cliente de aplicacion.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave secreta de applicacion</label>
                                <input type="text" id="razorpay_key_secret" name="razorpay_key_secret" class="form-control" value="<?php echo $wo['config']['razorpay_key_secret'];?>">
                                <small class="admin-info">La clave secreta de su aplicación.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
			<div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el método de pago de PaySera</h6>
                    <form class="paysera-settings" method="POST">
                        <div class="float-left">
                            <label for="paysera_payment" class="main-label">Metodo de pago PaySera</label>
                            <br><small class="admin-info">Reciba pagos del proveedor de pago de PaySera.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="paysera_payment" value="0" />
                            <input type="checkbox" name="paysera_payment" id="chck-paysera_payment" value="1" <?php echo ($wo['config']['paysera_payment'] == 'yes') ? 'checked': '';?>>
                            <label for="chck-paysera_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>

                        <label for="paysera_mode">Modo PaySera</label>
                        <select class="form-control show-tick" id="paysera_mode" name="paysera_mode">
                          <option value="0" <?php echo ($wo['config']['paysera_mode'] == '0')  ? ' selected': '';?>>Live</option>
                          <option value="1" <?php echo ($wo['config']['paysera_mode'] == '1')  ? ' selected': '';?>>SandBox</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicacion, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Projecto ID</label>
                                <input type="text" id="paysera_project_id" name="paysera_project_id" class="form-control" value="<?php echo $wo['config']['paysera_project_id'];?>">
                                <small class="admin-info">Su ID de proyecto de PaySera.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Contraseña de la cuenta</label>
                                <input type="text" id="paysera_sign_password" name="paysera_sign_password" class="form-control" value="<?php echo $wo['config']['paysera_sign_password'];?>">
                                <small class="admin-info">La contraseña de su cuenta PaySera.</small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el metodo de pago de Yoomoney</h6>
                    <form class="yoomoney-settings" method="POST">
                        <div class="float-left">
                            <label for="yoomoney_payment" class="main-label">Metodo de pago Yoomoney</label>
                            <br><small class="admin-info">Reciba el pago del proveedor de pagos de Yoomoney.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="yoomoney_payment" value="0" />
                            <input type="checkbox" name="yoomoney_payment" id="chck-yoomoney_payment" value="1" <?php echo ($wo['config']['yoomoney_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-yoomoney_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Identificacion de billetera</label>
                                <input type="text" id="yoomoney_wallet_id" name="yoomoney_wallet_id" class="form-control" value="<?php echo $wo['config']['yoomoney_wallet_id'];?>">
                                <small class="admin-info">Su ID de billetera Yoomoney.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Secreto de autenticacion de notificaciones</label>
                                <input type="text" id="yoomoney_notifications_secret" name="yoomoney_notifications_secret" class="form-control" value="<?php echo $wo['config']['yoomoney_notifications_secret'];?>">
                                <small class="admin-info">Su secreto de autenticacion de notificaciones de Yoomoney.</small>
                            </div>
                        </div>
                        <small class="admin-info">Por favor agregue esta URL <?php echo($wo['config']['site_url']) ?>/requests.php?f=yoomoney&s=success <a href="https://yoomoney.ru/transfer/myservices/http-notification" target="_blank">in HTTP notifications</a></small>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pago SecurionPay</h6>
                    <div class="securionpay-settings-alert"></div>
                    <form class="securionpay-settings" method="POST">
                        <div>
                            <div class="float-left">
                                <label for="securionpay_payment" class="main-label">Metodo de pago Securionpay</label>
                                <br><small class="admin-info">Habilite Securionpay para recibir pagos con tarjetas de credito.</small>
                            </div>
                            <div class="form-group float-right switcher">
                                <input type="hidden" name="securionpay_payment" value="0">
                                <input type="checkbox" name="securionpay_payment" id="securionpay_payment-enabled" value="1" <?php echo ($wo['config']['securionpay_payment'] == '1') ? 'checked': '';?>>
                                <label for="securionpay_payment-enabled" class="check-trail"><span class="check-handler"></span></label>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>

                        <label for="securionpay_public_key">Securionpay Clave pública</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="securionpay_public_key" name="securionpay_public_key" class="form-control" value="<?php echo $wo['config']['securionpay_public_key'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <label class="form-check-label" for="securionpay_secret_key">Clave secreta de Securionpay</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="securionpay_secret_key" name="securionpay_secret_key" class="form-control" value="<?php echo $wo['config']['securionpay_secret_key'];?>">
                                <small class="admin-info"></small>
                            </div>
                        </div>
                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pago Authorize.Net</h6>
                    <div class="authorize-settings-alert"></div>
                    <form class="authorize-settings" method="POST">
                        <div>
                            <div class="float-left">
                                <label for="authorize_payment" class="main-label">Metodo de pago Authorize.Net</label>
                                <br><small class="admin-info">Habilite Authorize.Net para recibir pagos con tarjetas de credito.</small>
                            </div>
                            <div class="form-group float-right switcher">
                                <input type="hidden" name="authorize_payment" value="0">
                                <input type="checkbox" name="authorize_payment" id="authorize_payment-enabled" value="1" <?php echo ($wo['config']['authorize_payment'] == '1') ? 'checked': '';?>>
                                <label for="authorize_payment-enabled" class="check-trail"><span class="check-handler"></span></label>
                            </div>
                            <div class="clearfix"></div>
                            <label for="authorize_test_mode">Test mode</label>
                        <select class="form-control show-tick" id="authorize_test_mode" name="authorize_test_mode">
                          <option value="PRODUCTION" <?php echo ($wo['config']['authorize_test_mode'] == 'PRODUCTION') ? 'selected': '';?>>Live</option>
                          <option value="SANDBOX" <?php echo ($wo['config']['authorize_test_mode'] == 'SANDBOX') ? 'selected': '';?>>Test</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicación, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                            <hr>
                        </div>

                        <label for="authorize_login_id">ID DE INICIO DE SESION API Authorize.Net</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="authorize_login_id" name="authorize_login_id" class="form-control" value="<?php echo $wo['config']['authorize_login_id'];?>">
                                <small class="admin-info">Su ID DE INICIO DE SESION API Authorize.Net.</small>
                            </div>
                        </div>
                        <label class="form-check-label" for="authorize_transaction_key">CLAVE DE TRANSACCION Authorize.Net</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="authorize_transaction_key" name="authorize_transaction_key" class="form-control" value="<?php echo $wo['config']['authorize_transaction_key'];?>">
                                <small class="admin-info">Su CLAVE DE TRANSACCION Authorize.Net.</small>
                            </div>
                        </div>

                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Pago Flutter Wave</h6>
                    <div class="fluttewave-settings-alert"></div>
                    <form class="fluttewave-settings" method="POST">
                        <div>
                            <div class="float-left">
                                <label for="fluttewave_payment" class="main-label">Metodo de pago Flutter Wave</label>
                                <br><small class="admin-info">Habilite Flutter Wave para recibir pagos.</small>
                            </div>
                            <div class="form-group float-right switcher">
                                <input type="hidden" name="fluttewave_payment" value="0">
                                <input type="checkbox" name="fluttewave_payment" id="fluttewave_payment-enabled" value="1" <?php echo ($wo['config']['fluttewave_payment'] == '1') ? 'checked': '';?>>
                                <label for="fluttewave_payment-enabled" class="check-trail"><span class="check-handler"></span></label>
                            </div>
                            <div class="clearfix"></div>
                            <hr>
                        </div>

                        <label for="fluttewave_secret_key">Clave secreta de API de Flutter Wave</label>
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input type="text" id="fluttewave_secret_key" name="fluttewave_secret_key" class="form-control" value="<?php echo $wo['config']['fluttewave_secret_key'];?>">
                                <small class="admin-info">Tu clave secreta de la API de Flutter Wave.</small>
                            </div>
                        </div>

                        <input type="hidden" name="hash_id" value="<?php echo lui_CreateSession();?>">
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                  <h6 class="card-title">Configurar el método de pago de Ngenius</h6>
                    <form class="ngenius-settings" method="POST">
                        <div class="float-left">
                            <label for="ngenius_payment" class="main-label">Metodo de pago Ngenius</label>
                            <br><small class="admin-info">Reciba pagos del proveedor de pagos Ngenius.</small>
                        </div>
                        <div class="form-group float-right switcher">
                            <input type="hidden" name="ngenius_payment" value="0" />
                            <input type="checkbox" name="ngenius_payment" id="chck-ngenius_payment" value="1" <?php echo ($wo['config']['ngenius_payment'] == '1') ? 'checked': '';?>>
                            <label for="chck-ngenius_payment" class="check-trail"><span class="check-handler"></span></label>
                        </div>
                        <div class="clearfix"></div>
                        <label for="ngenius_mode">Test mode</label>
                        <select class="form-control show-tick" id="ngenius_mode" name="ngenius_mode">
                          <option value="live" <?php echo ($wo['config']['ngenius_mode'] == 'live') ? 'selected': '';?>>Live</option>
                          <option value="sandbox" <?php echo ($wo['config']['ngenius_mode'] == 'sandbox') ? 'selected': '';?>>Test</option>
                        </select>
                        <small class="admin-info">Elija el modo que usa su aplicacion, para probar use el modo SandBox.</small>
                        <div class="clearfix"></div>
                        <hr>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">Clave API de Ngenius</label>
                                <input type="text" id="ngenius_api_key" name="ngenius_api_key" class="form-control" value="<?php echo $wo['config']['ngenius_api_key'];?>">
                                <small class="admin-info">Su clave API de Ngenius.</small>
                            </div>
                        </div>
                        <div class="form-group form-float">
                            <div class="form-line">
                              <label class="form-label">ID de salida de Ngenius</label>
                                <input type="text" id="ngenius_outlet_id" name="ngenius_outlet_id" class="form-control" value="<?php echo $wo['config']['ngenius_outlet_id'];?>">
                                <small class="admin-info">Su identificacion de Ngenius Outlet.</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>
    <!-- #END# Vertical Layout -->
<script>
function CustomName(self) {
    if ($(self).is(':checked')) {
        $('.custom_name_class').removeClass('hidden');
    }
    else{
        $('.custom_name_class').addClass('hidden');
    }
}
function GetSupportedCoins() {
    $('form.coinpayments-settings').find('.btn-success').text('Please wait..');
    $.get(Wo_Ajax_Requests_File() + '?f=admin_setting&s=get_supported_coins', function (data) {
        if (data.status == 200) {
            location.reload();
        } else {
            $('.coinpayments-settings-alert').html('<div class="alert alert-danger">'+data.message+'</div>');
            setTimeout(function () {
                $('.coinpayments-settings-alert').empty();
            }, 2000);
        }
        $('form.coinpayments-settings').find('.btn-success').text('Get Supported Coins');
    });
}
$(function() {

  $('.switcher input[type=checkbox]').click(function () {
        setToTrue = 0;
        if ($(this).is(":checked") === true) {
            setToTrue = 1;
        }
        var configName = $(this).attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        if (configName == 'transaction_log' || configName == 'paypal' ||
          configName == 'bitcoin' || configName == 'credit_card' ||
          configName == 'alipay' || configName == 'checkout_payment' ||
          configName == 'paystack_payment' ||
          configName == 'razorpay_payment' ||
          configName == 'cashfree_payment'||
          configName == 'paysera_payment') {
            setToTrue = 'no';
            if ($(this).is(":checked") === true) {
              setToTrue = 'yes';
            }
        }
        objData[configName] = setToTrue;
        objData['hash_id'] = hash_id;
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData);
    });

    var setTimeOutColor = setTimeout(function (){});
    $('select').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
	$('.round_check input[type=radio]').on('change', function() {
         clearTimeout(setTimeOutColor);
        var thisElement = $(this);
        var configName = thisElement.attr('name');
        var hash_id = $('input[name=hash_id]').val();
        var objData = {};
        objData[configName] = this.value;
        objData['hash_id'] = hash_id;
        thisElement.addClass('warning');
        $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
            if (data.status == 200) {
                thisElement.removeClass('warning');
                thisElement.addClass('success');
            } else {
                thisElement.addClass('error');
            }
            var setTimeOutColor = setTimeout(function () {
                thisElement.removeClass('success');
                thisElement.removeClass('warning');
                thisElement.removeClass('error');
            }, 2000);
        });
    });
	
    $('input[type=text], input[type=number], textarea').on('input', delay(function() {
            clearTimeout(setTimeOutColor);
            var thisElement = $(this);
            var configName = thisElement.attr('name');
            var hash_id = $('input[name=hash_id]').val();
            var objData = {};
            objData[configName] = this.value;
            objData['hash_id'] = hash_id;
            thisElement.addClass('warning');
            $.post( Wo_Ajax_Requests_File() + '?f=admin_setting&s=update_general_setting', objData, function (data) {
                if (data.status == 200) {
                    thisElement.removeClass('warning');
                    thisElement.addClass('success');
                } else {
                    thisElement.addClass('error');
                }
                var setTimeOutColor = setTimeout(function () {
                    thisElement.removeClass('success');
                    thisElement.removeClass('warning');
                    thisElement.removeClass('error');
                }, 2000);
                //thisElement.focus();
            });
    }, 500));
});
</script>
