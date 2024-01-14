document.addEventListener('DOMContentLoaded', function () {
    var mySwiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 25,
        loop: true,
        centerSlide: 'true',
        fade: 'true',
        gragCursor: 'true',
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        breakpoints: {
            0: {
                slidesPerView: 1,
            },
            1024: {
                slidesPerView: 2,
            },
            1440: {
                slidesPerView: 3,
            },
        }
    });
});

function showAnswer(answerId) {
    // Use AJAX to fetch the answer from the server
    var xhr = new XMLHttpRequest();

    // Specify the PHP file that will handle the request (faq.php in this case)
    var phpFile = 'includes/get-answer.php';

    // Set up the request
    xhr.open('POST', phpFile, true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    // Set up the callback function to handle the response
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            console.log(xhr.responseText); // Log the response to the console

            if (xhr.status == 200) {
                // Parse the JSON response
                try {
                    var response = JSON.parse(xhr.responseText);

                    // Update the answer box content
                    document.getElementById('answerBox').innerHTML = `
                        <h2>${response.title}</h2>
                        <p>${response.content}</p>
                        <a href="faq-selengkapnya.php?questionId=${answerId}">Selengkapnya</a>
                    `;
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }
            } else {
                console.error('Error in AJAX request. Status:', xhr.status);
            }
        }
    };

    // Send the request with the answerId
    xhr.send('action=get_answer&answerId=' + encodeURIComponent(answerId));
}

function searchQuestions() {
    var input, filter, ul, li, p, i, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    ul = document.getElementById('questionBox');
    li = ul.getElementsByTagName('li');
    var noResultMessage = document.getElementById('noResultMessage');

    var found = false;

    for (i = 0; i < li.length; i++) {
        p = li[i].getElementsByTagName('p')[0];
        txtValue = p.textContent || p.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = '';
            found = true;
        } else {
            li[i].style.display = 'none';
        }
    }

    if (found) {
        noResultMessage.style.display = 'none';
    } else {
        noResultMessage.style.display = 'block';
    }
}