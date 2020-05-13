const signout = () => {
  window.location.href = "../../";
};

const modifyItem = (id, item_id, item_desc, item_qty) => {
  const idInput = document.getElementById("id");
  const itemInput = document.getElementById("edit-id");
  const descInput = document.getElementById("edit-description");
  const qtyInput = document.getElementById("edit-quantity");

  idInput.value = id;
  itemInput.value = item_id;
  descInput.value = item_desc;
  qtyInput.value = item_qty;

  openModifyModal();
};

const deleteItem = (id) => {
  window.location.href = "../../actions/deleteItem.php?id=" + id;
};

const openModifyModal = () => {
  const modal = document.getElementById("modify-modal");
  modal.style.display = "flex";
};

const closeModifyModal = () => {
  const modal = document.getElementById("modify-modal");
  modal.style.display = "none";
};

const openAddModal = () => {
  const modal = document.getElementById("add-modal");
  modal.style.display = "flex";
};
const closeAddModal = () => {
  const modal = document.getElementById("add-modal");
  modal.style.display = "none";
};
