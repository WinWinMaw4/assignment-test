// import './bootstrap';
//
// import Alpine from 'alpinejs';
//
// window.Alpine = Alpine;
//
// Alpine.start();

import * as bootstrap from 'bootstrap';
import Swal from "sweetalert2";



let logoutBtn = document.querySelector('.logout');
logoutBtn.addEventListener('click',(e)=>{
    e.preventDefault();
    let logout = document.getElementById('logout')
    confirmBox(logout);
});


function confirmBox($actionElement){
    Swal.fire({
        title: 'Are you sure?',
        text: "You must be log in again",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#920cff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, log out!'
    }).then((result) => {
        if (result.isConfirmed) {
            $actionElement.submit();

        }
    })
}

//for delete

let delBtn = document.getElementsByClassName('del-btn');
for(let i=0; i<= delBtn.length ; i++){
    delBtn[i].addEventListener('click',function (event){
        event.preventDefault();
        formId = this.getAttribute('form');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#920cff',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(formId).submit();
                Swal.fire(
                    'Deleted!',
                    '',
                    'success'
                )
                // const Toast = Swal.mixin({
                //     toast: true,
                //     position: 'top-end',
                //     showConfirmButton: false,
                //     timer: 3000,
                //     timerProgressBar: true,
                //     didOpen: (toast) => {
                //         toast.addEventListener('mouseenter', Swal.stopTimer)
                //         toast.addEventListener('mouseleave', Swal.resumeTimer)
                //     }
                // })
                //
                // Toast.fire({
                //     icon: 'success',
                //     title: 'Signed in successfully'
                // })
            }
        })
    })

}

//session status return

