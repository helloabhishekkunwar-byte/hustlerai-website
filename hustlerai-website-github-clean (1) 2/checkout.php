<?php
// HustlerAI custom checkout - customer details first, Razorpay payment second.
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Secure Checkout | HustlerAI Workshop</title>
<link rel="icon" href="assets/hustlerai-logo.png">
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#080d17;--blue:#0878f9;--blue2:#0756d8;--line:#e3e9f2;--muted:#66738a}*{box-sizing:border-box}body{margin:0;background:#eef3fb;color:var(--ink);font-family:Inter,Arial,sans-serif}.top{background:#05080e;color:white;padding:18px max(24px,calc((100% - 1440px)/2));display:flex;align-items:center;justify-content:space-between;gap:20px;border-bottom:2px solid #0878f9;box-shadow:0 8px 30px #0b3b7925}.brand{display:flex;align-items:center;gap:14px}.brand img{width:58px;height:58px;object-fit:contain;border-radius:10px}.brandname{font-size:28px;font-weight:800;letter-spacing:-1px}.brandname span{color:#1384ff}.tag{font-size:12px;color:#bdc8d8;margin-top:3px;letter-spacing:1px}.secure{font-size:13px;color:#e6edf8;text-align:right;line-height:1.6}.secure b{color:#5ee6a2}.wrap{max-width:1440px;margin:34px auto;padding:0 24px;display:grid;grid-template-columns:minmax(0,1.55fr) minmax(320px,.95fr);gap:24px;align-items:start}.panel{background:white;border:1px solid #e4eaf3;border-radius:18px;padding:30px;box-shadow:0 16px 45px #122b4b12}.steps{display:flex;align-items:center;gap:12px;padding-bottom:22px;border-bottom:1px solid var(--line);font-weight:700}.step{display:flex;align-items:center;gap:10px}.num{width:38px;height:38px;border-radius:50%;background:var(--blue);color:#fff;display:grid;place-items:center}.num.off{background:#e8edf5;color:#66738a}.line{height:2px;background:#dce4ef;flex:1;max-width:160px}.muted{color:#7a879c}.h1{font-size:28px;margin:24px 0 6px;letter-spacing:-.8px}.sub{margin:0 0 24px;color:var(--muted)}.formgrid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.field.full{grid-column:1/-1}.field label{display:block;font-weight:700;font-size:13px;margin-bottom:8px}.field input,.field select{width:100%;height:50px;border:1px solid #d8e0ec;border-radius:10px;padding:0 14px;font:inherit;color:#172238;background:#fff;outline:none}.field input:focus,.field select:focus{border-color:var(--blue);box-shadow:0 0 0 3px #0878f91b}.btn{width:100%;margin-top:22px;border:0;border-radius:11px;background:linear-gradient(100deg,#087bff,#0758d9);color:#fff;font-size:17px;font-weight:800;padding:17px;cursor:pointer;box-shadow:0 9px 22px #0878f933}.btn:disabled{opacity:.65;cursor:wait}.under{text-align:center;color:#718096;font-size:12px;margin-top:13px}.summary{background:linear-gradient(145deg,#090e18,#111c2c);color:white;border-radius:18px;padding:28px;box-shadow:0 16px 45px #122b4b20}.summary h2{margin:0 0 22px;font-size:23px}.product{display:flex;gap:14px;align-items:center;padding:18px 0;border-top:1px solid #29364a;border-bottom:1px solid #29364a}.product img{width:70px;height:70px;object-fit:cover;border-radius:12px}.product strong{display:block;font-size:16px;margin-bottom:7px}.product p{color:#c0cad9;font-size:13px;line-height:1.5;margin:0}.price{margin-left:auto;white-space:nowrap;font-weight:800}.total{display:flex;justify-content:space-between;align-items:center;padding:22px 0;font-weight:700}.total b{font-size:34px}.guarantee{background:#12342d;border:1px solid #1c5949;border-radius:13px;padding:17px;color:#76efad;font-weight:700;font-size:14px}.guarantee small{display:block;color:#d2e9df;font-weight:400;margin-top:5px}.footer{text-align:center;color:#6c7b90;font-size:13px;padding:10px 20px 30px}.footer b{color:#1673d9}.error{display:none;background:#fff1f1;color:#b42318;padding:12px;border-radius:9px;margin-top:12px;font-size:13px}@media(max-width:850px){.wrap{grid-template-columns:1fr;margin:18px auto}.summary{order:-1}.top{padding:14px 18px}.brandname{font-size:23px}.secure{font-size:11px}.panel{padding:22px}}@media(max-width:520px){.formgrid{grid-template-columns:1fr}.field.full{grid-column:auto}.top{align-items:flex-start}.secure{max-width:120px}.steps{font-size:13px}.h1{font-size:24px}.panel,.summary{padding:20px}.brand img{width:48px;height:48px}}
</style>
</head>
<body>
<header class="top"><div class="brand"><img src="assets/hustlerai-logo.png" alt="HustlerAI logo"><div><div class="brandname">Hustler<span>AI</span></div><div class="tag">LEARN · BUILD · GROW</div></div></div><div class="secure"><b>✓ Secure Checkout</b><br>Your payment is protected by Razorpay</div></header>
<main class="wrap">
<section class="panel">
 <div class="steps"><div class="step"><span class="num">1</span> Customer Details</div><span class="line"></span><div class="step muted"><span class="num off">2</span> Payment</div></div>
 <h1 class="h1">Billing Information</h1><p class="sub">Enter your details to continue to secure payment.</p>
 <form id="customerForm"><div class="formgrid">
  <div class="field"><label for="first">First Name *</label><input id="first" name="first_name" autocomplete="given-name" required maxlength="60" placeholder="Enter first name"></div>
  <div class="field"><label for="last">Last Name *</label><input id="last" name="last_name" autocomplete="family-name" required maxlength="60" placeholder="Enter last name"></div>
  <div class="field full"><label for="email">Email Address *</label><input id="email" name="email" type="email" autocomplete="email" required maxlength="120" placeholder="you@example.com"></div>
  <div class="field full"><label for="phone">Phone Number *</label><input id="phone" name="phone" type="tel" autocomplete="tel" inputmode="numeric" pattern="[6-9][0-9]{9}" maxlength="10" required placeholder="10-digit Indian mobile number"></div>
  <div class="field"><label for="country">Country</label><select id="country" name="country"><option value="India" selected>India</option></select></div>
  <div class="field"><label for="state">State</label><input id="state" name="state" maxlength="60" placeholder="Enter state"></div>
 </div><div class="error" id="errorBox" role="alert"></div><button class="btn" id="payBtn" type="submit">Continue to Payment&nbsp; →</button><div class="under">🔒 Your information is securely transmitted. Payment is processed by Razorpay.</div></form>
</section>
<aside class="summary"><h2>Order Summary</h2><div class="product"><img src="assets/hustlerai-logo.png" alt="HustlerAI"><div><strong>HustlerAI Workshop</strong><p>Learn AI. Build Websites. Create Ads. Grow Your Business.</p></div><div class="price">₹297</div></div><div class="total"><span>Total Amount</span><b>₹297</b></div><div class="guarantee">✓ &nbsp;30-Day Money-Back Guarantee<small>As per the workshop refund policy.</small></div></aside>
</main><footer class="footer">Secure payment powered by <b>Razorpay</b> · UPI · Cards · Netbanking</footer>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
const form=document.getElementById('customerForm'),btn=document.getElementById('payBtn'),err=document.getElementById('errorBox');
form.addEventListener('submit',async(e)=>{e.preventDefault();err.style.display='none';btn.disabled=true;btn.textContent='Please wait…';
 const data=Object.fromEntries(new FormData(form).entries());data.name=(data.first_name+' '+data.last_name).trim();
 try{
  const response=await fetch('api/create-order.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(data)});
  const order=await response.json();if(!response.ok||!order.order_id)throw new Error(order.error||'Unable to start payment. Please try again.');
  const options={key:order.key_id,amount:order.amount,currency:'INR',name:'HustlerAI',description:'HustlerAI Workshop',order_id:order.order_id,prefill:{name:data.name,email:data.email,contact:data.phone},theme:{color:'#0878f9'},handler:async function(result){
   try{const vr=await fetch('api/verify-payment.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify(result)});const v=await vr.json();if(!vr.ok||!v.verified)throw new Error(v.error||'Payment verification is pending. Contact support with your payment ID.');window.location.href='payment-success.php?payment_id='+encodeURIComponent(result.razorpay_payment_id);}catch(ex){alert(ex.message+' Payment ID: '+result.razorpay_payment_id);btn.disabled=false;btn.textContent='Continue to Payment →';}
  },modal:{ondismiss:function(){btn.disabled=false;btn.textContent='Continue to Payment →';}}};
  const rzp=new Razorpay(options);rzp.on('payment.failed',function(resp){err.textContent=resp.error.description||'Payment failed. Please try again.';err.style.display='block';btn.disabled=false;btn.textContent='Continue to Payment →';});rzp.open();
 }catch(ex){err.textContent=ex.message;err.style.display='block';btn.disabled=false;btn.textContent='Continue to Payment →';}
});
</script>
</body></html>
