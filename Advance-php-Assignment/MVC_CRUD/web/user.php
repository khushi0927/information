<?php require_once "web/header.php"; ?>
    <div style="text-align: right; margin: 20px 0px 10px;">
        <a id="btnAddAction" href="index.php?action=user-add"><img src="web/images/icon-add.png" />Add User</a>
    </div>
   <div id="toys-grid">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>USer Name</strong></th>
                    <th><strong>Email</strong></th>
                    <th><strong>Number</strong></th>
                      <th><strong>Action</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) 
                            {
                            ?>
                 <tr>
                    <td><?php echo $result[$k]["name"]; ?></td>
                    <td><?php echo $result[$k]["email"]; ?></td>
                    <td><?php echo $result[$k]["number"]; ?></td>
                    <td>

                    <a class="btnEditAction"
                        href="index.php?action=user-edit&id=<?php echo $result[$k]["id"]; ?>">
                        <img src="web/images/icon-edit.png" />
                        </a>
                        <a class="btnDeleteAction" 
                        href="index.php?action=user-delete&id=<?php echo $result[$k]["id"]; ?>">
                        <img src="web/images/icon-delete.png" />
                        </a>

                    </td>
                   
                </tr>
                    <?php
                        }
                    }
                    ?>
                
            
            
            <tbody>
        
        </table>
    </div>
</body>
</html>