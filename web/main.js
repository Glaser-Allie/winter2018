  var content = document.querySelector('main');

        document.querySelector('button').addEventListener('click', function() {

            // Toggle classes
            document.querySelector('span').classList.toggle('active');
            document.querySelector('span').classList.toggle('cross');
            document.querySelector('ul').classList.toggle('nav-visible');
            content.classList.toggle('activenav');
        }, false);