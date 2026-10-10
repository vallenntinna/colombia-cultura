/* =====================================================================
 *  Cultura de Colombia - Interacciones del sitio
 * =================================================================== */
(function () {
  "use strict";

  var doc = document;

  /* ---------------------------------------------------------------
   * Header: sombra al hacer scroll + botón "volver arriba"
   * ------------------------------------------------------------- */
  var headerBar = doc.getElementById("headerBar");
  var toTop = doc.getElementById("toTop");

  function onScroll() {
    var y = window.pageYOffset || doc.documentElement.scrollTop;
    if (headerBar) {
      headerBar.classList.toggle("shadow-soft", y > 8);
    }
    if (toTop) {
      toTop.classList.toggle("hidden", y < 420);
    }
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  if (toTop) {
    toTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ---------------------------------------------------------------
   * Menú móvil
   * ------------------------------------------------------------- */
  var menuBtn = doc.getElementById("menuBtn");
  var menu = doc.getElementById("mobileMenu");
  var iconOpen = doc.getElementById("menuIconOpen");
  var iconClose = doc.getElementById("menuIconClose");

  function setMenu(open) {
    if (!menu || !menuBtn) return;
    menu.classList.toggle("hidden", !open);
    if (iconOpen) iconOpen.classList.toggle("hidden", open);
    if (iconClose) iconClose.classList.toggle("hidden", !open);
    menuBtn.setAttribute("aria-expanded", open ? "true" : "false");
    menuBtn.setAttribute("aria-label", open ? "Cerrar menú" : "Abrir menú");
  }

  if (menuBtn && menu) {
    menuBtn.addEventListener("click", function () {
      setMenu(menu.classList.contains("hidden"));
    });
    menu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () { setMenu(false); });
    });
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 1024) setMenu(false);
    });
  }

  /* ---------------------------------------------------------------
   * Animaciones de aparición al hacer scroll (reveal)
   * ------------------------------------------------------------- */
  var reveals = Array.prototype.slice.call(doc.querySelectorAll(".reveal"));

  if ("IntersectionObserver" in window && reveals.length) {
    var observer = new IntersectionObserver(function (entries) {
      var delay = 0;
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.style.transitionDelay = Math.min(delay, 400) + "ms";
        entry.target.classList.add("is-visible");
        observer.unobserve(entry.target);
        delay += 80;
      });
    }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });

    reveals.forEach(function (el) { observer.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-visible"); });
  }

  /* ---------------------------------------------------------------
   * Filtros por región (gastronomía, música, festividades, destinos)
   * ------------------------------------------------------------- */
  doc.querySelectorAll("[data-filters]").forEach(function (group) {
    var targetId = group.getAttribute("data-target");
    var grid = doc.getElementById(targetId);
    if (!grid) return;
    var empty = doc.getElementById(targetId.replace("Grid", "Empty"));
    var buttons = group.querySelectorAll("[data-filter]");

    buttons.forEach(function (btn) {
      btn.addEventListener("click", function () {
        buttons.forEach(function (b) { b.classList.remove("is-active"); });
        btn.classList.add("is-active");

        var filter = btn.getAttribute("data-filter");
        var visible = 0;

        grid.querySelectorAll("[data-region]").forEach(function (item) {
          var match = filter === "all" || item.getAttribute("data-region") === filter;
          item.classList.toggle("hidden", !match);
          if (match) {
            visible++;
            item.classList.remove("is-visible");
            /* re-disparar animación */
            void item.offsetWidth;
            item.classList.add("is-visible");
          }
        });

        if (empty) empty.classList.toggle("hidden", visible !== 0);
      });
    });
  });

  /* ---------------------------------------------------------------
   * Año dinámico (si existe el marcador)
   * ------------------------------------------------------------- */
  doc.querySelectorAll("[data-year]").forEach(function (el) {
    el.textContent = String(new Date().getFullYear());
  });
})();
