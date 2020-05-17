const signout = () => {
  window.location.href = "../../";
};

const modifyItem = (
  id,
  item_id,
  item_name,
  item_series,
  item_qty,
  trend_val,
  created_at
) => {
  const idInput = document.getElementById("id");
  const createdAt = document.getElementById("created-at");
  const itemInput = document.getElementById("edit-id");
  const nameInput = document.getElementById("edit-name");
  const seriesInput = document.getElementById("edit-series");
  const qtyInput = document.getElementById("edit-quantity");
  const trendInput = document.getElementById("edit-trend");

  idInput.value = id;
  createdAt.value = created_at;
  itemInput.value = item_id;
  nameInput.value = item_name;
  seriesInput.value = item_series;
  qtyInput.value = item_qty;
  trendInput.value = trend_val;

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
