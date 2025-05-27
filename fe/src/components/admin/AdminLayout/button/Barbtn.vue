<template>
  <div class="">
    <input id="menu-toggle-checkbox" type="checkbox" />
    <label class="menu-toggle-btn" for="menu-toggle-checkbox">
      <div id="menu-bar1" class="menu-bars"></div>
      <div id="menu-bar2" class="menu-bars"></div>
      <div id="menu-bar3" class="menu-bars"></div>
    </label>
  </div>
</template>


<style>
#menu-toggle-checkbox {
  display: none;
}

.menu-toggle-btn {
  position: relative;
  width: 40px;
  height: 40px;
  cursor: pointer;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 8px;
  transition-duration: 0.3s;
}

.menu-bars {
  width: 100%;
  height: 4px;
  background-color: rgb(0, 0, 0);
  border-radius: 5px;
  transition-duration: 0.3s;
}

#menu-toggle-checkbox:checked + .menu-toggle-btn #menu-bar2 {
  transform: translateY(14px) rotate(60deg);
  margin-left: 0;
  transform-origin: right;
  transition-duration: 0.3s;
  z-index: 2;
}

#menu-toggle-checkbox:checked + .menu-toggle-btn #menu-bar1 {
  transform: translateY(28px) rotate(-60deg);
  transition-duration: 0.3s;
  transform-origin: left;
  z-index: 1;
}

#menu-toggle-checkbox:checked + .menu-toggle-btn {
  transform: rotate(-90deg);
}
</style>