document.getElementById('contact-form').reset();
function showToast(message, isSuccess) {
    const toast = document.createElement('div');
    toast.textContent = message;
    toast.style.position = 'fixed';
    toast.style.bottom = '20px';
    toast.style.right = '20px';
    toast.style.padding = '10px 20px';
    toast.style.borderRadius = '5px';
    toast.style.backgroundColor = isSuccess ? '#4CAF50' : '#F44336';
    toast.style.color = 'white';
    
    document.body.appendChild(toast);
    
    setTimeout(() => {
      document.body.removeChild(toast);
    }, 3000);
  }
  

  document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('/ICO/contact/send', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        showToast('Message envoyé avec succès !', true);
        this.reset();
      } else {
        showToast('Erreur lors de l\'envoi du message.', false);
      }
    })
    .catch(error => {
      showToast('Erreur lors de l\'envoi du message.', false);
    });
  });
  