<?php require '../app/views/layouts/header.php'; ?>

<div class="page-wrapper" style="padding-top:120px;">

<main class="contact-section">
<h1>Get In Touch</h1>
<p>To assist you better, please share your email and select the subject of your inquiry. Our team will reach out to you promptly.</p>

<form class="contact-form" id="contactForm">
<input type="email" placeholder="E-mail" required>
<select required>
<option value="">Topic</option>
<option>Auctions</option>
<option>Shop Inquiry</option>
<option>Partnership</option>
<option>Other</option>
</select>
</form>

<div class="btn-row">
<button type="button" onclick="openTermsModal()">Send</button>
</div>
</main>

<div class="terms-modal" id="termsModal">
<div class="terms-modal-content">
<h2>Terms And Conditions</h2>
<p>By continuing, you confirm that you have read and agree to Arthienne’s Terms and Conditions.</p>
<label class="terms-checkbox">
<input type="checkbox" id="acceptTerms">
I agree to the <a href="/arthienne/public/terms" target="_blank">Terms And Conditions</a>
</label>
<div class="terms-actions">
<button id="declineTerms">Cancel</button>
<button id="confirmTerms" disabled>Accept And Continue</button>
</div>
</div>
</div>

</div>

<script>
const modal=document.getElementById('termsModal')
const checkbox=document.getElementById('acceptTerms')
const confirmBtn=document.getElementById('confirmTerms')
document.getElementById('declineTerms').onclick=()=>modal.style.display='none'
confirmBtn.onclick=()=>{modal.style.display='none';document.getElementById('contactForm').submit()}
checkbox.onchange=()=>confirmBtn.disabled=!checkbox.checked
function openTermsModal(){modal.style.display='block'}
</script>

<?php require '../app/views/layouts/footerExtended.php'; ?>
