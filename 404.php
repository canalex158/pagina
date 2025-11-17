<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>404 — Aquí no hay nada (salvo una carita triste)</title>
  <style>
    :root{--bg:#0f1724;--card:#0b1220;--accent:#ff6b6b;--muted:#9aa4b2}
    *{box-sizing:border-box}
    html,body{height:100%;margin:0;font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,'Helvetica Neue',Arial}
    body{display:flex;align-items:center;justify-content:center;background:linear-gradient(180deg,#071023 0%, #0e2133 100%);color:#e6eef6}
    .wrap{width:min(960px,92%);background:linear-gradient(180deg,rgba(255,255,255,0.02),transparent);border-radius:16px;padding:36px;box-shadow:0 10px 30px rgba(2,6,23,0.7);display:grid;grid-template-columns:220px 1fr;gap:28px;align-items:center}
    .face{display:flex;align-items:center;justify-content:center;width:220px;height:220px;border-radius:16px;background:radial-gradient(circle at 30% 20%, rgba(255,255,255,0.03), transparent),linear-gradient(180deg,#07142a,#092033);box-shadow:inset 0 -6px 20px rgba(0,0,0,0.5)}
    /* big sad face */
    .face svg{width:160px;height:160px;display:block}
    .content h1{margin:0;font-size:28px;letter-spacing:-0.02em}
    .content p{margin:12px 0;color:var(--muted)}
    .actions{margin-top:18px;display:flex;gap:12px;flex-wrap:wrap}
    .btn{background:#071a2b;border:1px solid rgba(255,255,255,0.03);padding:10px 14px;border-radius:10px;color:#e6eef6;text-decoration:none;font-weight:600}
    .btn.primary{background:linear-gradient(90deg,var(--accent),#ff9b9b);color:#081219;box-shadow:0 6px 18px rgba(255,107,107,0.16);}
    .hint{font-size:13px;color:var(--muted);margin-top:12px}
    .tiny{font-size:12px;color:rgba(230,238,246,0.6)}
    .search{display:flex;gap:8px;margin-top:14px}
    .search input{flex:1;padding:10px 12px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);background:transparent;color:inherit}
    .search button{padding:10px 12px;border-radius:10px;border:1px solid rgba(255,255,255,0.04);background:rgba(255,255,255,0.02);color:inherit}
    footer{grid-column:1/-1;margin-top:8px;color:var(--muted);font-size:13px}

    /* playful animation */
    @keyframes tear {0%{transform:translateY(0);opacity:1}60%{transform:translateY(18px);opacity:1}100%{transform:translateY(36px);opacity:0}}
    .tear{fill:#7ec8ff;opacity:0.9;animation:tear 1.6s ease-in-out infinite}
    .mouth sad{ }

    /* responsive */
    @media (max-width:720px){.wrap{grid-template-columns:1fr;gap:18px;padding:22px}.face{margin:0 auto}}
  </style>
</head>
<body>
  <main class="wrap" role="main">
    <div class="face" aria-hidden="true">
      <!-- svg carita triste con lágrima animada -->
      <svg viewBox="0 0 120 120" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <defs>
          <filter id="shadow" x="-50%" y="-50%" width="200%" height="200%">
            <feDropShadow dx="0" dy="6" stdDeviation="6" flood-color="#000" flood-opacity="0.35"/>
          </filter>
        </defs>
        <g filter="url(#shadow)">
          <circle cx="60" cy="60" r="46" fill="#0b2a45" />
        </g>
        <!-- ojos -->
        <ellipse cx="44" cy="50" rx="6" ry="8" fill="#e6eef6"/>
        <ellipse cx="76" cy="50" rx="6" ry="8" fill="#e6eef6"/>
        <!-- pupilas tristes -->
        <circle cx="44" cy="52" r="2.6" fill="#071426"/>
        <circle cx="76" cy="52" r="2.6" fill="#071426"/>
        <!-- cejas bajas -->
        <path d="M34 42 Q44 36 52 44" stroke="#08314a" stroke-width="2.6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
        <path d="M68 44 Q76 36 86 42" stroke="#08314a" stroke-width="2.6" fill="none" stroke-linecap="round" stroke-linejoin="round" opacity="0.7"/>
        <!-- boca triste -->
        <path d="M40 78 Q60 64 80 78" stroke="#ff9aa2" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
        <!-- lágrima animada -->
        <g transform="translate(76,62)">
          <path class="tear" d="M4 2 C6 8 4 12 0 14 C-4 12 -6 8 -4 2 C-2 -2 2 -2 4 2 Z" />
        </g>
      </svg>
    </div>

    <div class="content">
      <h1>404 — No encontramos esto, ¡ups!</h1>
      <p>La página que buscas se ha ido de vacaciones sin avisar. Se dejó una nota: "Me voy a la playa".</p>

      <div class="actions">
        <a href="/" class="btn primary">Ir al inicio</a>
        <a href="javascript:history.back()" class="btn">Volver atrás</a>
        <a href="/sitemap.xml" class="btn">Mapa del sitio</a>
      </div>

      <div class="search" role="search">
        <input type="search" placeholder="Busca en el sitio... (ej: contacto, precios, gatitos)">
        <button class="btn">Buscar</button>
      </div>

      <p class="hint">Consejo técnico: si tienes un enlace roto, cópialo y pégalo en un mensaje y díselo al admin. O grita muy fuerte. Preferible: manda un ticket.</p>

      <p class="tiny">ID de error: <strong>#404-0xFROWNY</strong> · Fecha: <span id="fecha"></span></p>
    </div>

    <footer>
      <span>¿Quieres una versión más seria? Puedo hacer una con tu logo, colores y un GIF de gatitos. 🐱</span>
    </footer>
  </main>

  <script>
    // fecha en formato legible
    const fecha = new Date();
    document.getElementById('fecha').textContent = fecha.toLocaleString('es-ES', {year:'numeric',month:'short',day:'2-digit',hour:'2-digit',minute:'2-digit'});

    // búsqueda falsa para demo
    document.querySelector('.search button').addEventListener('click', ()=>{
      const q = document.querySelector('.search input').value.trim();
      if(!q) {
        alert('Prueba a escribir algo... por ejemplo: "gatitos"');
      } else {
        alert('No encontramos "'+q+'" — pero genial sugerencia. Gracias 📝');
      }
    });
  </script>
</body>
</html>
