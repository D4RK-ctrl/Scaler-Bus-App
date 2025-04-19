// console.log("Hii")

// Extracting letters for profile wrapper
function setProfile() {
    let name = "Daksh Shah"
    var profile_wrapper = document.querySelector('.profile-picture')
    function profile_wrapper_text(naam){
        var ans="";
        ans+=naam[0];
        let i;
        for(i=0;i<naam.length;i++){
            if(naam[i]==' '){
                break;
            }
        }
        ans+=naam[i+1];
        return ans;
    }
    profile_wrapper.innerHTML=profile_wrapper_text(name);
}

// Check date
function setDate() {
    document.querySelectorAll(".time").forEach((element) => {
        let data = element.textContent.trim(); // Get text content safely
        let DATE = check_date(data);
        let TIME = extract_time(data);
        element.innerHTML = `${DATE}` + `<br>` + `${TIME}`; // Use template literals
    });
}
function extract_time(dt){
    const time = dt.split(' ')[1].slice(0,5);
    return time;
}
function check_date(dt) {
    const date = new Date(dt);
    date.setHours(0, 0, 0, 0);

    const today = new Date();
    today.setHours(0, 0, 0, 0);

    const tomorrow = new Date(today); // copy today
    tomorrow.setDate(today.getDate() + 1); // add 1 day

    if (today.getTime() === date.getTime()) {
        return "Today";
    }
    if (tomorrow.getTime() === date.getTime()) {
        return "Tomorrow";
    }
    return modify_date(dt.split(" ")[0]); // Extract YYYY-MM-DD from the input
}
function modify_date(dateStr) {
    const date = new Date(dateStr);
    const day = date.getDate();
    const month = date.toLocaleString('default', { month: 'long' });

    // Get ordinal suffix: "st", "nd", "rd", "th"
    const getOrdinal = (n) => {
        if (n >= 11 && n <= 13) return 'th';
        const lastDigit = n % 10;
        if (lastDigit === 1) return 'st';
        if (lastDigit === 2) return 'nd';
        if (lastDigit === 3) return 'rd';
        return 'th';
    };

    return `${day}${getOrdinal(day)} ${month}`;
}


// Status
function setChip() {
    document.querySelectorAll(".status").forEach(function(element){
        let chip = document.createElement("span")
    
        if(element.textContent=="on_time"){
            chip.classList.add("green","item","chip")
            chip.innerHTML="On Time"
        }
        if(element.textContent=="departed"){
            chip.classList.add("blue","item","chip")
            chip.innerHTML="Departed"
        }
        if(element.textContent=="delayed"){
            chip.classList.add("yellow","item","chip")
            chip.innerHTML="Delayed"
        }
        if(element.textContent=="reached"){
            chip.classList.add("gray","item","chip")
            chip.innerHTML="Reached"
        }
        if(element.textContent=="cancelled"){
            chip.classList.add("red","item","chip")
            chip.innerHTML="Cancelled"
        }
        
    
        element.innerHTML=""
        element.appendChild(chip)
    });
}







setProfile();
loadTable();

document.body.addEventListener('submit', function (e) {
    if (e.target.id === 'delete-form') {
        e.preventDefault();
        
        const form = e.target;
        const formData = new FormData(form);
        formData.append('delete', '1'); 

        fetch('delete.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            loadTable();
        });
    }

    
    if (e.target.id === 'addScheduleForm') {
        e.preventDefault();
        const formData = new FormData(e.target);

        fetch('add.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.text())
        .then(data => {
            console.log(data); // Debug
            e.target.reset();
            loadTable();
        });
    }
});

function loadTable() {
    fetch('load-table.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('table-body').innerHTML = data;
            setChip();
            setDate();
        });
}


document.addEventListener('DOMContentLoaded', function () {
    const openBtn = document.getElementById('openAddFormBtn');
    const modal = document.getElementById('modalOverlay');
    const closeBtn = document.getElementById('closeModal');

    openBtn.addEventListener('click', () => modal.style.display = 'flex');
    closeBtn.addEventListener('click', () => modal.style.display = 'none');
    window.addEventListener('click', (e) => {
        if (e.target === modal) modal.style.display = 'none';
    });
});