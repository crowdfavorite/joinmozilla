<?php

define('APPLICATION_ROOT', $_SERVER['DOCUMENT_ROOT']);

header('Content-type: text/html; charset=utf-8');
if (array_key_exists('locale', $_GET))
  $locale = $_GET['locale'];
else
  $locale = 'en-US';
putenv("LC_ALL=" . $locale);
setlocale(LC_ALL , $locale);

bindtextdomain('messages', APPLICATION_ROOT . '/locale');
bind_textdomain_codeset("messages", "UTF-8");
textdomain('messages');

require_once('header.php');
?>
<div class="bsd-contribForm-wrap bsd-contribForm-oneCol">
  <div class="bsd-contribForm-aboveContent"> </div>
    <form id="contribution">
      <table>
        <tbody>
          <tr>
            <td class="contribcolumn" style="width: 300px;">
              <label class="fieldlabel"></label><input id="signup_optin" name="signup_optin" value="1" type="checkbox"><label for="signup_optin"><span class="radio"><?= _('Sign up for the mailing list') ?></span></label>
              <table>
                <tbody>
                  <tr>
                    <td class="contribheader"><?= _('Choose Your Destiny') ?></td>
                  </tr>
                  <tr>
                    <td>
                      <table class="amounts">
                        <tbody>
                          <tr>
                            <td>
                              <label class="fieldlabel"></label>
                              <input id="q_0" type="radio" value="5" name="amount" onclick="" />
                              <label for="q_0">
                                <span class="radio">
                                  <?= sprintf( /* L10n: Please use US dollars as the currency. Both formatting arguments are the same number. Note that the first $ sign in both cases is an actual dollar sign; it is not part of the format string.*/ _('$%1$.2f - Sign me up and use my $%1$d to build a Web of good'), 5) ?>
                                </span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="fieldlabel"></label>
                              <input id="q_1" type="radio" value="30" name="amount" onclick="" />
                              <label for="q_1">
                                <span class="radio">
                                <?= sprintf( /* L10n: Please use US dollars as the currency. Both formatting arguments are the same number. Note that the first $ sign in both cases is an actual dollar sign; it is not part of the format string. */ _('$%1.2f - Sign me up, use my donation to build a Web of good and send me a Mozilla t-shirt'), 30) ?>
                                </span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="fieldlabel"></label>
                              <input id="q_other" name="amount" value="other" type="radio" />
                              <label for="q_other">
                                <span class="radio">
                                  <?= /* L10n: Other donation amount */ _('Other:') ?>
                                </span>
                              </label>&nbsp;
                              <input size="4" intl_currency_symbol="USD" name="amount_other" type="text" /> <?= /* L10n: Currency symbol */ _('(USD)') ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
  </form>
</div>

<h2><?= _('Legal Compliance') ?></h2>
<p>
  <input type="checkbox" id="legal_agree" />
  <label for="legal_agree"><?= sprintf(/* L10n: The placeholder '%s' is a URL. */ _('I agree to the <a href="%s">Mozilla privacy policy</a>.'), "http://www.mozilla.org/about/policies/privacy-policy.html") ?></label>
</p>

<div class="bsd-contribForm-belowContent">
  <p>
    <small class="legal"><?= _('By clicking \'Process Contribution\' you will be registered as a Mozilla Supporter and receive Mozilla related email communication. You can unsubscribe from this communication at any time.') ?></small>
  </p>
  <p>
    <small class="legal"><?= _('Unfortunately, we can only currently ship the T-shirt to your billing address.') ?></small>
  </p>
  <p>
    <small class="legal"><?= _('Contributions go to the Mozilla Foundation, a 501(c)(3) organization, to be used in its discretion for its charitable purposes. They are tax-deductible in the U.S. to the fullest extent permitted by law. Fair market value of the T-shirt is $7 USD.') ?></small>
  </p>
</div>
<?php

require_once('footer.php');

?>
