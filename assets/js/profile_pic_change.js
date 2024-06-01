const profile_pic_icon = document.getElementById('profile-change-icon');
const profile_pic_text = document.getElementById('profile-change-text');

const pic_input_field = document.getElementById('profile-pic');

profile_pic_icon.addEventListener("click", ()=> {
    pic_input_field.click();
});

profile_pic_text.addEventListener("click", ()=> {
    pic_input_field.click();
});

pic_input_field.addEventListener("change", ()=>{
    document.getElementById('profile-pic-form').submit();
});