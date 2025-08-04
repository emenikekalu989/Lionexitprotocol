// connect.js

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('connect-form');
  const phraseInput = document.getElementById('phrase');
  const messageBox = document.getElementById('message');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const phrase = phraseInput.value.trim();
    const words = phrase.split(/\s+/);

    if (words.length === 12) {
      messageBox.innerHTML = `
        <p style="color: green; font-weight: bold;">
          ✅ Phrase accepted. Sync complete.
        </p>
        <p style="font-size: 13px; color: #666;">
          🔒 Your private key was not stored or sent anywhere. This sync is fully local.
        </p>
      `;
    } else {
      messageBox.innerHTML = `
        <p style="color: red; font-weight: bold;">
          ❌ Invalid input. Enter exactly 12 words.
        </p>
      `;
    }

    // Optional: clear the input after 5 seconds
    setTimeout(() => {
      phraseInput.value = '';
    }, 5000);
  });
});