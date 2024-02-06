let counter = 0;

function manualSlider(){
    // The images slide only when the radio buttons are clicked
    const radio_slider_1 = document.getElementById('slider1');
    radio_slider_1.addEventListener('change', function(e) {
        const checked = e.target.checked;
        // Check if the radio button is active
        if (checked){
            const image_slider = document.querySelector(".image-slider .garbage1");
            image_slider.style.marginLeft = '0%';
            counter = 0;
        }
    });
    const radio_slider_2 = document.getElementById('slider2');
    radio_slider_2.addEventListener('change', function(e) {
        const checked = e.target.checked;
        // Check if the radio button is active
        if (checked){
            const image_slider = document.querySelector(".image-slider .garbage1");
            image_slider.style.marginLeft = '-100%';
            counter = 1;
        }
    });
    const radio_slider_3 = document.getElementById('slider3');
    radio_slider_3.addEventListener('change', function(e) {
        const checked = e.target.checked;
        // Check if the radio button is active
        if (checked){
            const image_slider = document.querySelector(".image-slider .garbage1");
            image_slider.style.marginLeft = '-200%';
            counter = 2;
        }
    });



}
function autoSlider(){
    // The images slide on a set interval
    setInterval(function(){
        const radio_slider = document.getElementById(`slider${counter+1}`);
        radio_slider.checked = true
        if (counter === 0){
            const image_slider = document.querySelector(".image-slider .garbage1");
            image_slider.style.marginLeft = '0%';
        }
        else{
            const image_slider = document.querySelector(".image-slider .garbage1");
            image_slider.style.marginLeft = `-${counter}00%`;
        }
        counter++;
        if (counter > 3){
            counter = 0;
            
        }
    }, 5000);

}
function main() {
    manualSlider();
    autoSlider();
}
main()