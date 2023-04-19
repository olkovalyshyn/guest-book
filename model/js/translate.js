let arrLang = new Array();
arrLang['eng'] = new Array();
arrLang['ua'] = new Array();

arrLang['eng']['logo'] = 'Guest book';
arrLang['eng']['home'] = 'Home';
arrLang['eng']['link'] = 'Link';
arrLang['eng']['logout'] = 'Log out';
arrLang['eng']['login'] = 'Log in';
arrLang['eng']['signup'] = 'Sign up';
arrLang['eng']['username'] = 'Username';
arrLang['eng']['email'] = 'Email';
arrLang['eng']['date'] = 'Date';
arrLang['eng']['message'] = 'Message';
arrLang['eng']['addmesage'] = 'Add message';
arrLang['eng']['addMessageForm'] = 'Add message form';
arrLang['eng']['homepage'] = 'Homepage';
arrLang['eng']['captcha'] = 'Captcha: enter symbols';
arrLang['eng']['language'] = 'Language';
arrLang['eng']['ukrainian'] = 'Ukrainian';
arrLang['eng']['english'] = 'English';
arrLang['eng']['chooseFile'] = 'Choose file';
arrLang['eng']['close'] = 'Close';
arrLang['eng']['sendMessage'] = 'Send message';
arrLang['eng']['password'] = 'Password';
arrLang['eng']['forgotPassword'] = 'Forgot password?';
arrLang['eng']['cancel'] = 'Cancel';
// forgotPassword  Forgot password?
//     canсel Canсel
// сlose Close
// sendMessage  Send message
// addMesageForm Add message form
// homepage Homepage
// captcha Captcha: enter symbols
// language Language
// ukrainian Ukrainian
// english English
// chooseFile Choose file

arrLang['ua']['logo'] = 'Гостьова книга';
arrLang['ua']['home'] = 'Домашня';
arrLang['ua']['link'] = 'Посилання';
arrLang['ua']['logout'] = 'Вийти';
arrLang['ua']['login'] = 'Авторизуватися';
arrLang['ua']['signup'] = 'Зареєструватися';
arrLang['ua']['username'] = 'Ім\'я користувача';
arrLang['ua']['email'] = 'Пошта';
arrLang['ua']['date'] = 'Дата';
arrLang['ua']['message'] = 'Повідомлення';
arrLang['ua']['addmesage'] = 'Додати повідомлення';
arrLang['ua']['addMessageForm'] = 'Додати повідомлення';
arrLang['ua']['homepage'] = 'Домашня сторінка';
arrLang['ua']['captcha'] = 'Введіть символи';
arrLang['ua']['language'] = 'Мова';
arrLang['ua']['ukrainian'] = 'Українська';
arrLang['ua']['english'] = 'Англійська';
arrLang['ua']['chooseFile'] = 'Виберіть файл';
arrLang['ua']['close'] = 'Закрити';
arrLang['ua']['sendMessage'] = 'Надіслати повідомлення';
arrLang['ua']['password'] = 'Пароль';
arrLang['ua']['forgotPassword'] = 'Забули пароль?';
arrLang['ua']['cancel'] = 'Скасувати';


$(document).ready(function () {
    //при перевантаженні сторніки щоб не збивались налаштування
    let lang = localStorage.getItem('lang') || 'eng';
    $('.lang').each(function (){
        $(this).text(arrLang[lang][$(this).data('translate')])
        $('.translate').each(function (){
            if($(this).attr('id') === lang){
                $(this).addClass('btn-success');
            }
        })
    })

    $('.translate').on('click', function () {
        let lang = $(this).attr('id');
        localStorage.setItem('lang', lang);

        $('.translate').removeClass('btn-success'); //знімає виділення зі всіх
        $(this).addClass('btn-success'); //ставить виділення на активну

        $('.lang').each(function (){
            $(this).text(arrLang[lang][$(this).data('translate')])
        })
    })
})

