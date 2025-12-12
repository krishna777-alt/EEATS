
  const tabs = document.querySelectorAll('.account-nav li');
  const contents = document.querySelectorAll('.tab-content');
  

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      // Remove active from all tabs
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      // Hide all contents
      contents.forEach(content => content.classList.remove('active'));

      // Show clicked tab's content
      const target = tab.getAttribute('data-tab');
      document.getElementById(target).classList.add('active');
    });
  });

    // Preview selected image
    // const fileInput = document.getElementById('profile-pic');
    // const previewImg = document.getElementById('current-profile-pic');

    // fileInput.addEventListener('change', function () {
    //   const file = this.files[0];
    //   if (file) {
    //     const reader = new FileReader();
    //     reader.onload = function (e) {
    //       previewImg.src = e.target.result;
    //     };
    //     reader.readAsDataURL(file);
    //   }
    // });

// Preview selected image/////////////////////////////////////////////////////////userUpdate.php
    // const fileInput = document.getElementById('profile-pic');
    // const previewImg = document.getElementById('current-profile-pic');

    // fileInput.addEventListener('change', function () {
    //   const file = this.files[0];
    //   if (file) {
    //     const reader = new FileReader();
    //     reader.onload = function (e) {
    //       previewImg.src = e.target.result;
    //     };
    //     reader.readAsDataURL(file);
    //   }
    // });