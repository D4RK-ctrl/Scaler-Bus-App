<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <script src="script.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="logosst.png" alt="">
        </div>
        <div class="profile-wrapper">
            <div class="profile-picture">SS</div>
        </div>
    </nav>
    <header>
        <span>Hey, Daksh!</span>
        <span class="footer">Welcome back :)</span>
    </header>
    <main>
        <div class="modal-overlay" id="modalOverlay">
            <div class="modal">
                <span class="close-btn" id="closeModal">&times;</span>
                <h2>Add New Bus Schedule</h2>
                <form id="addScheduleForm">
                    <input type="text" name="driver" placeholder="Driver Name" required>
                    <input type="text" name="source" placeholder="From" required>
                    <input type="datetime-local" name="departure" required>
                    <input type="text" name="destination" placeholder="To" required>
                    <input type="datetime-local" name="arrival" required>
                    <select name="status" required>
                        <option value="on_time" selected>On Time</option>
                        <option value="departed">Departed</option>
                        <option value="delayed">Delayed</option>
                        <option value="reached">Reached</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <button type="submit">Add</button>
                </form>
            </div>
        </div>

        <button id="openAddFormBtn" class="add-btn">+ Add Schedule</button>

        <div class="table-body" id="table-body"></div>
    </main>
</body>
</html>