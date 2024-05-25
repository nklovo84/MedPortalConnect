/*
    Author: Nubia Lovo Student number 041093757 
    Course: CST8285  
    Lab Section: 331
    Assesment: Assignment2 
    File Name: script.js
    Professor: Malek El-Kouzi
    Date Created: Nov 19, 2023
    Date Modified: Nov 23, 2023
    Due Date: Nov 26, 2023
    Version: 1.0
    Description: A javascript file for A webpage register form
*/
function validateLogin() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  if (username.trim() === "" || password.trim() === "") {
    alert("Please enter both username and password");
    return false;
  }

  return true;
}

function validateRegisterForm() {
  clearErrorMessages();
  const username = document.getElementById('username');
  const password = document.getElementById('password');
  const cfmpassword = document.getElementById('cfmpassword');
  const firstname = document.getElementById('firstname');
  const lastname = document.getElementById('lastname');
  const dateofbirth = document.getElementById('dateofbirth');
  const email = document.getElementById('email');
  const phonenumber = document.getElementById('phonenumber');
  const gender = document.getElementById('gender');
  const healthcardno = document.getElementById('healthcardno');
  const versioncode = document.getElementById('versioncode');
  const cardexpirydate = document.getElementById('cardexpirydate');

  let isValid = true;

  const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  if (!emailPattern.test(email.value)) {
    displayError(email, 'Email address should be non-empty with the format xyx@xyz.xyz).');
    isValid = false;
  }
  email.addEventListener('input', function () {
    if (!email.test(email.value)) {
      clearErrorEachMessage(email);
      displayError(email, 'Email address should be non-empty with the format xyx@xyz.xyz).');
      isValid = false;
    }
    else {
      clearErrorEachMessage(email);

    }
  });

  if (username.value.trim() === '' || username.value.length >= 10) {
    displayError(username, 'User name should be non-empty and less than 10 characters.');
    isValid = false;
  } else {
    username.value = username.value.toLowerCase();
  }

  username.addEventListener('input', function () {
    if (username.value.trim() === '' || username.value.length >= 10) {
      clearErrorEachMessage(username);
      displayError(username, 'User name should be non-empty and less than 10 characters.');
      isValid = false;
    } else {
      username.value = username.value.toLowerCase();
      clearErrorEachMessage(username);

    }

  });

  if (password.value.length < 6) {
    displayError(password, 'Password must be at least 6 characters long.');
    isValid = false;
  }

  password.addEventListener('input', function () {
    if (password.value.length < 6) {
      clearErrorEachMessage(password);
      displayError(password, 'Password must be at least 6 characters long.');
      isValid = false;
    } else {

      clearErrorEachMessage(password);

    }

  });


  if (password.value !== cfmpassword.value || cfmpassword.value === '') {
    displayError(cfmpassword, 'Passwords do not match or are blank.');
    isValid = false;
  }

  cfmpassword.addEventListener('input', function () {

    if (password.value !== cfmpassword.value || cfmpassword.value === '') {
      clearErrorEachMessage(cfmpassword);
      displayError(cfmpassword, 'Passwords do not match or are blank.');
      isValid = false;
    } else {

      clearErrorEachMessage(cfmpassword);
    }

  });


  if (firstname.value === '') {
    displayError(firstname, 'Firstname should not blank');
    isValid = false;
  }

  firstname.addEventListener('input', function () {

    if (firstname.value === '') {
      clearErrorEachMessage(firstname);
      displayError(firstname, 'Firstname should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(firstname);
    }

  });


  if (lastname.value === '') {
    displayError(lastname, 'Lastname should not blank');
    isValid = false;
  }

  lastname.addEventListener('input', function () {

    if (lastname.value === '') {
      clearErrorEachMessage(lastname);
      displayError(lastname, 'Lastname should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(lastname);
    }

  });

  if (dateofbirth.value === '') {
    displayError(dateofbirth, 'Date of birth should not blank');
    isValid = false;
  }

  dateofbirth.addEventListener('input', function () {

    if (dateofbirth.value === '') {
      clearErrorEachMessage(dateofbirth);
      displayError(dateofbirth, 'Date of birth should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(dateofbirth);
    }

  });
  if (phonenumber.value === '') {
    displayError(phonenumber, 'Phone number should not blank');
    isValid = false;
  }

  phonenumber.addEventListener('input', function () {

    if (phonenumber.value === '') {
      clearErrorEachMessage(phonenumber);
      displayError(phonenumber, 'Phone number should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(phonenumber);
    }

  });


  if (gender.value === 'Select gender') {
    displayError(gender, 'Gender should not be blank');
    isValid = false;
  }

  gender.addEventListener('change', function () {
    if (gender.value === 'Select gender') {
      clearErrorEachMessage(gender);
      displayError(gender, 'Gender should not be blank');
      isValid = false;
    } else {
      clearErrorEachMessage(gender);
    }
  });



  if (healthcardno.value === '') {
    displayError(healthcardno, 'Health card no should not blank');
    isValid = false;
  }

  healthcardno.addEventListener('input', function () {

    if (healthcardno.value === '') {
      clearErrorEachMessage(healthcardno);
      displayError(healthcardno, 'health card no should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(healthcardno);
    }

  });


  if (versioncode.value === '') {
    displayError(versioncode, 'Version code should not blank');
    isValid = false;
  }

  versioncode.addEventListener('input', function () {

    if (versioncode.value === '') {
      clearErrorEachMessage(versioncode);
      displayError(versioncode, 'Version code should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(versioncode);
    }

  });


  if (cardexpirydate.value === '') {
    displayError(cardexpirydate, 'Card expiry date should not blank');
    isValid = false;
  }

  cardexpirydate.addEventListener('input', function () {

    if (cardexpirydate.value === '') {
      clearErrorEachMessage(cardexpirydate);
      displayError(cardexpirydate, 'Card expiry date should not blank');
      isValid = false;
    } else {

      clearErrorEachMessage(cardexpirydate);
    }

  });
  if (isValid == true) {
    alert('Register success!');
  }
  return isValid;


}

function displayError(element, message) {
  const errorMessage = document.createElement('div');
  errorMessage.className = 'error-message';
  errorMessage.style.color = 'red';
  errorMessage.style.fontSize = '10px';

  errorMessage.textContent = message;
  element.parentNode.appendChild(errorMessage);
  element.style.border = '1px solid red';
}

function clearErrorMessages() {
  const errorMessages = document.querySelectorAll('.error-message');
  errorMessages.forEach((message) => {
    message.remove();

  });
  const termsErrorDiv = document.getElementById('terms-error');
  if (termsErrorDiv) {
    termsErrorDiv.textContent = '';
  }


  const formElements = document.querySelectorAll('input[type="text"], input[type="password"], textarea');
  formElements.forEach((element) => {
    element.style.border = '2px solid black';
  });
}

function clearErrorEachMessage(element) {
  const errorMessage = element.parentNode.querySelector('.error-message');
  if (errorMessage) {
    errorMessage.remove();
  }
  element.style.border = '2px solid black';
  element.removeEventListener('input', arguments.callee);
}



document.addEventListener('DOMContentLoaded', function () {
  var cancelBtn = document.getElementById('cancelBtn');

  if (cancelBtn) {
    cancelBtn.addEventListener('click', function () {
      window.location.href = 'login.html';
    });
  }
});

function redirectToNotificationPage() {

  window.location.href = "../server/pages/notification.php";
}


function redirectToUserProfilePage() {

  window.location.href = "../server/pages/userprofile.php";
}

function redirectToNotificationPage() {

  window.location.href = "../server/pages/notification.php";
}

function redirectToNotificationPageForPHP() {
  window.location.href = "../pages/notification.php";
}

function redirectToUserProfilePageForPHP() {
  window.location.href = "../pages/userprofile.php";
}

function toggleSidebar() {
  const sidebar = document.querySelector('.sidebar');
  sidebar.classList.toggle('open');
}

function deleteUserWaitlist(button) {
  var userWaitlistId = button.getAttribute('data-user-waitlist-id');

  alert('Your waitlist has been deleted!');
  window.location.href = '../dao/delete_user_waitlist.php?userWaitlistId=' + userWaitlistId;
}

function showProviderDialog() {
  var dialog = document.getElementById('provider-dialog');
  dialog.style.display = 'block';
}
function showLocationDialog() {
  var dialog = document.getElementById('location-dialog');
  dialog.style.display = 'block';
}
function closeLocationDialog() {
  var dialog = document.getElementById('location-dialog');
  dialog.style.display = 'none';
}

function closeProviderDialog() {
  var dialog = document.getElementById('provider-dialog');
  dialog.style.display = 'none';
}

function addUserWaitlist(userid) {
  var providerSelect = document.getElementById("providerSelect");
  var selectedProviderId = providerSelect.value;
  var path = '../dao/add_user_waitlist.php';
  window.location.href = `${path}?providerId=${selectedProviderId}&userId=${userid}`;
  alert('User added to waitlist!');
  closeProviderDialog();
}

function updateUserLocation(userid) {
  var locationSelect = document.getElementById("locationSelect");
  var selectedLocationId = locationSelect.value;
  var path = '../dao/update_user_waitlist_preference.php';
  window.location.href = `${path}?locationId=${selectedLocationId}&userId=${userid}`;
  alert('User added to waitlist!');
  closeProviderDialog();
}

function filterTable() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("providerFilter");
  filter = input.value.toUpperCase();
  table = document.querySelector("table");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
          } else {
              tr[i].style.display = "none";
          }
      }
  }
}