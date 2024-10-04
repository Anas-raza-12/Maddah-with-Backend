function countUpOrDown(
  containerId,
  start,
  end,
  speed = 10,
  effect = "bounceOut",
  effectDuration = "0.05s",
  endEffect = "zoomIn",
  endEffectDuration = "0.5s"
) {
  const container = document.getElementById(containerId);
  let current = start;
  container.innerHTML = current;
  container.className = `animate__animated ${effect}`;

  const interval = setInterval(() => {
    container.className = `animate__animated ${effect}`;
    container.innerHTML = current;

    if (current === end) {
      clearInterval(interval);
      container.className = `animate__animated animate__${endEffect}`;
      container.style.animationDuration = endEffectDuration;
    } else {
      current += start < end ? 1 : -1;
    }
  }, speed);
}

countUpOrDown("numberWang1", 0, 15, 30, "bounceOut", "0.05s", "zoomIn", "3s");
countUpOrDown(
  "numberWang2",
  0,
  150,
  30,
  "bounceOut",
  "0.05s",
  "zoomIn",
  "0.5s"
);
countUpOrDown("numberWang3", 0, 15, 30, "bounceOut", "0.05s", "zoomIn", "3s");
countUpOrDown(
  "numberWang4",
  0,
  100,
  30,
  "bounceOut",
  "0.05s",
  "zoomIn",
  "0.5s"
);

