<?php
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
                                  <?= sprintf( /* L10n: Please use US dollars as the currency. Both formatting arguments are the same number. Note that the first $ sign in both cases is an actual dollar sign; it is not part of the format string.*/ _('$%1$.2f - Sign me up as a Mozilla supporter'), 5) ?>
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
                                <?= sprintf( /* L10n: Please use US dollars as the currency. Both formatting arguments are the same number. Note that the first $ sign in both cases is an actual dollar sign; it is not part of the format string. */ _('$%1.2f - Sign me up as a Mozilla supporter and send a Mozilla Firefox T-shirt'), 30) ?>
                                </span>
                              </label>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class="contribheader"><?= _('T-Shirt') ?></td>
                  </tr>
                  <tr>
                    <td>
                      <table>
                        <tr>
                          <td>
                            <label class="fieldlabel"><?= _('Size') ?><br /></label>
                            <input size="30" name="custom1" type="text" />
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <label class="fieldlabel"><?= _('Color') ?><br /></label>
                            <input size="30" name="custom2" type="text" />
                          </td>
                        </tr>
						<tr>
							<td><input type="text" name="some-name" value="" id="some-name" /></td>
						</tr>
						
						<tr><td class="contribheader"> 
		                Legal Compliance
		              </td> 
		            </tr><tr><td><table><tr>    <td> 
		              <label class="fieldlabel"></label><input class="legal_confirm_checkbox" id="legal_confirm" name="legal_confirm" type="checkbox" value="1" /><label for="legal_confirm">I agree to the</label> <a href="http://www.mozilla.org/about/policies/privacy-policy.html" target="_blank">Mozilla privacy policy</a><label>.</label> 
		            </td></tr></table></td></tr>
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