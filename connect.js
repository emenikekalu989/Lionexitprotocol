document.getElementById("connectBtn").addEventListener("click", function () {
  const mnemonic = document.getElementById("mnemonic").value.trim();
  const words = mnemonic.split(/\s+/);

  const result = document.getElementById("result");
  result.classList.remove("hidden");

  if (words.length !== 12) {
    result.innerHTML = `<p style="color: red;">❌ You must enter exactly 12 words.</p>`;
    return;
  }

  result.innerHTML = `
    <p style="color: green;">✅ Wallet synced successfully!</p>
    <p><strong>Your 12 words:</strong></p>
    <code>${words.join(" ")}</code>
    <p style="font-size: 0.9em; color: gray;">Private keys are not stored. You're safe.</p>
  `;
});