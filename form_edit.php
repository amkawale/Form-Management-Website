<!DOCTYPE html>
<html>
<head>
    <title>Records List</title>
    <style>
        .modal { display: none; position: fixed; z-index: 1; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgb(0,0,0); background-color: rgba(0,0,0,0.4); padding-top: 60px; }
        .modal-content { background-color: #fefefe; margin: 5% auto; padding: 20px; border: 1px solid #888; width: 80%; }
    </style>
    <script>
        function openEditModal(id) {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `get_form_data.php?id=${id}`, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const data = JSON.parse(xhr.responseText);
                    if (data) {
                        document.getElementById('editId').value = data.id;
                        document.getElementById('editProjectGroup').value = data.project_group;
                        document.getElementById('editProjectType').value = data.project_type;
                        document.getElementById('editFormName').value = data.form_name;
                        document.getElementById('editNumTabs').value = data.num_tabs;
                        document.getElementById('editToggleStatus').value = data.toggle_status;
                        document.getElementById('editModal').style.display = 'block';
                    } else {
                        alert('Failed to fetch data.');
                    }
                }
            };
            xhr.send();
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function updateFormData() {
            const id = document.getElementById('editId').value;
            const projectGroup = document.getElementById('editProjectGroup').value;
            const projectType = document.getElementById('editProjectType').value;
            const formName = document.getElementById('editFormName').value;
            const numTabs = document.getElementById('editNumTabs').value;
            const toggleStatus = document.getElementById('editToggleStatus').value;

            if (id && projectGroup && projectType && formName && numTabs && toggleStatus) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'update_form_data.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        if (xhr.responseText == 'success') {
                            alert('Data updated successfully.');
                            closeEditModal();
                            loadData(); // Assuming you have a function to reload the data
                        } else {
                            alert('Failed to update data: ' + xhr.responseText);
                        }
                    }
                };
                const params = `id=${encodeURIComponent(id)}&projectGroup=${encodeURIComponent(projectGroup)}&projectType=${encodeURIComponent(projectType)}&formName=${encodeURIComponent(formName)}&numTabs=${encodeURIComponent(numTabs)}&toggleStatus=${encodeURIComponent(toggleStatus)}`;
                xhr.send(params);
            } else {
                alert('Please fill in all fields.');
            }
        }

        function loadData() {
            // Function to load and refresh the data table (not provided in the original question)
            // You should implement this function to fetch and display the records
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadData();
        });
    </script>
</head>
<body>
    <h2>Records List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Group</th>
                <th>Project Type</th>
                <th>Form Name</th>
                <th>Number of Tabs</th>
                <th>Toggle Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="dataTable">
            <!-- Data will be loaded here by loadData() -->
        </tbody>
    </table>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span onclick="closeEditModal()" style="float:right;">&times;</span>
            <h2>Edit Record</h2>
            <form id="editForm">
                <input type="hidden" id="editId" name="id">
                <label for="editProjectGroup">Project Group:</label>
                <input type="text" id="editProjectGroup" name="projectGroup" required><br>
                <label for="editProjectType">Project Type:</label>
                <input type="text" id="editProjectType" name="projectType" required><br>
                <label for="editFormName">Form Name:</label>
                <input type="text" id="editFormName" name="formName" required><br>
                <label for="editNumTabs">Number of Tabs:</label>
                <input type="number" id="editNumTabs" name="numTabs" required><br>
                <label for="editToggleStatus">Toggle Status:</label>
                <input type="text" id="editToggleStatus" name="toggleStatus" required><br>
                <button type="button" onclick="updateFormData()">Update Record</button>
            </form>
        </div>
    </div>
</body>
</html>
