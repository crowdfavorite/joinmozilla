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
                                <span class="radio"><?= _('$5.00 - Sign me up and use my $5 to build a Web of good') ?></span>
                              </label>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <label class="fieldlabel"></label>
                              <input id="q_1" type="radio" value="30" name="amount" onclick="" />
                              <label for="q_1">
                                <span class="radio"><?= _('$30.00 - Sign me up, use my donation to build a Web of good and send me a Mozilla t-shirt') ?></span>
                              </label>
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
<?php

require_once('footer.php');

?>
