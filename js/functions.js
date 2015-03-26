/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkPassword(password)
{
    var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return regex.test(password);
}

function validate(form) {
    var e = form.elements;

    /* Your validation code. */
    if (checkPassword(e['password'].value)) {
        if (e['password'].value != e['confirm-password'].value) {
            alert('Your passwords do not match. Please type more carefully.');
            return false;
        }
    }
    else {
        alert('Password must contain atleast 6 characters, including UPPER/lowercase and numbers')
        return false;
    }
    return true;
}

