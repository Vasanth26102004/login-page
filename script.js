const wrapper = document.querySelector('.wrapper');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnpopup = document.querySelector('.btnlogin-popup');
const iconclose = document.querySelector('.iconclose');

registerlink.addEventListener('click',()=> {
    wrapper.classList.add('active');
}); 

loginlink.addEventListener('click',()=> {
    wrapper.classList.remove('active');
});

btnpopup.addEventListener('click',()=> {
    wrapper.classList.add('active-popup');
});

iconclose.addEventListener('click',()=> {
    wrapper.classList.remove('active-popup');
});

$(document).ready(function() {
    $("register").click(function() {
        
        $.ajax({
            url: 'db.php', 
            type: 'POST', 
            data: { action: 'rregister' }, 
            success: function(response) {
                // Handle the response from the PHP file
                $("#message").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

$(document).ready(function() {
    $("login").click(function() {
        
        $.ajax({
            url: 'db.php', 
            type: 'POST', 
            data: { action: 'login' }, 
            success: function(response) {
                // Handle the response from the PHP file
                $("#result").html(response);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});