const pw = document.getElementById('password');
const cpw = document.getElementById('confirm');
const help = document.getElementById('pwHelp');
const submitBtn = document.getElementById('submitBtn');

function checkMatch() {
  if (!pw.value && !cpw.value) {
    pw.classList.remove('error','success');
    cpw.classList.remove('error','success');
    help.textContent = '';
    submitBtn.disabled = false;
    return;
  }
  if (cpw.value === '') {
    cpw.classList.remove('error','success');
    help.textContent = '';
    submitBtn.disabled = true;
    return;
  }
  if (pw.value === cpw.value) {
    pw.classList.add('success'); pw.classList.remove('error');
    cpw.classList.add('success'); cpw.classList.remove('error');
    help.textContent = 'Passwords match ✓';
    help.classList.remove('error');
    submitBtn.disabled = false;
  } else {
    pw.classList.add('error'); pw.classList.remove('success');
    cpw.classList.add('error'); cpw.classList.remove('success');
    help.textContent = 'Passwords do not match';
    help.classList.add('error');
    submitBtn.disabled = true;
  }
}

pw.addEventListener('input', checkMatch);
cpw.addEventListener('input', checkMatch);

document.getElementById('regForm').addEventListener('submit', function(e){
  if (pw.value !== cpw.value) {
    e.preventDefault();
    checkMatch();
    cpw.focus();
  }
});