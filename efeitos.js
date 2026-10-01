// Efeitos da página no estilo anos 90 (Windows 95 + GeoCities)
(function () {
    var poucoMovimento = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var formulario = document.querySelector('form');

    // Cria um elemento com classe e conteúdo HTML
    function criar(tag, classe, html) {
        var el = document.createElement(tag);
        el.className = classe;
        if (html) {
            el.innerHTML = html;
        }
        return el;
    }

    // ---------- 1. Tela de boot do DOS (só na primeira visita da sessão) ----------
    var jaIniciou = false;
    try {
        jaIniciou = sessionStorage.getItem('tabuada-boot') === 'sim';
        sessionStorage.setItem('tabuada-boot', 'sim');
    } catch (e) {}

    if (formulario && !jaIniciou && !poucoMovimento) {
        var boot = criar('div', 'boot',
            '<p>TABUADA BIOS v4.51PG - Copyright (C) 1997</p>' +
            '<p>Memória: 640K OK</p>' +
            '<p>Detectando calculadora................ OK</p>' +
            '<p>Carregando números de 1 a 10.......... OK</p>' +
            '<p>C:\\&gt; TABUADA.EXE<span class="cursor-dos">_</span></p>');
        boot.addEventListener('click', function () {
            boot.remove();
        });
        document.body.appendChild(boot);
        setTimeout(function () {
            boot.remove();
        }, 3200);
    }

    // ---------- 2. Título da aba rolando como letreiro ----------
    if (!poucoMovimento) {
        var titulo = '\u2726 TABUADA ONLINE \u2726 calcule GRÁTIS ';
        setInterval(function () {
            titulo = titulo.substring(1) + titulo.charAt(0);
            document.title = titulo;
        }, 250);
    }

    // ---------- 3. Rastro de brilhos atrás do mouse ----------
    var cores = ['#ff0000', '#ff9900', '#ffff00', '#00ff00', '#00ffff', '#ff00ff'];
    var ultimo = 0;

    if (!poucoMovimento) {
        document.addEventListener('mousemove', function (e) {
            var agora = Date.now();
            if (agora - ultimo < 40) {
                return;
            }
            ultimo = agora;

            var brilho = criar('span', 'brilho', '\u2726');
            brilho.style.left = e.clientX + 'px';
            brilho.style.top = e.clientY + 'px';
            brilho.style.color = cores[Math.floor(Math.random() * cores.length)];
            document.body.appendChild(brilho);

            setTimeout(function () {
                brilho.remove();
            }, 800);
        });
    }

    // ---------- 4. Contador de visitas girando até parar ----------
    var digitos = document.querySelectorAll('.contador span');
    if (digitos.length && !poucoMovimento) {
        var finais = [];
        digitos.forEach(function (d) {
            finais.push(d.textContent);
        });
        var inicio = Date.now();
        var giro = setInterval(function () {
            var passou = Date.now() - inicio;
            var parados = 0;
            digitos.forEach(function (d, i) {
                // cada dígito para um pouco depois do anterior, da esquerda pra direita
                if (passou > 600 + i * 250) {
                    d.textContent = finais[i];
                    parados++;
                } else {
                    d.textContent = Math.floor(Math.random() * 10);
                }
            });
            if (parados === digitos.length) {
                clearInterval(giro);
            }
        }, 60);
    }

    // ---------- 5. Barra de status reage ao número digitado ----------
    var campo = document.getElementById('numero');
    var status = document.querySelector('.barra-status span');
    if (campo && status) {
        campo.addEventListener('input', function () {
            status.textContent = campo.value
                ? 'Pronto para calcular a tabuada do ' + campo.value + '...'
                : 'Pronto.';
        });
        formulario.addEventListener('submit', function () {
            status.textContent = 'Calculando... aguarde!';
            document.documentElement.classList.add('ocupado');
        });
        formulario.addEventListener('reset', function () {
            status.textContent = 'Pronto.';
        });
    }

    // ---------- 6. Ícones da área de trabalho ----------
    var icones = [
        ['\uD83D\uDCBB', 'Meu Computador', 'Meu Computador: 1 calculadora, 640K de memória e muita vontade de fazer contas.'],
        ['\uD83D\uDCC1', 'Meus Documentos', 'Pasta vazia. Que tal calcular uma tabuada?'],
        ['\uD83C\uDF10', 'Internet Explorer', 'Erro: este site só funciona no Netscape Navigator! :P'],
        ['\uD83D\uDDD1\uFE0F', 'Lixeira', 'A Lixeira está vazia.']
    ];
    var area = criar('div', 'area-trabalho');
    icones.forEach(function (dados) {
        var icone = criar('button', 'icone', '<span>' + dados[0] + '</span>' + dados[1]);
        icone.type = 'button';
        icone.title = 'Clique duas vezes para abrir';
        icone.addEventListener('dblclick', function () {
            alert(dados[2]);
        });
        area.appendChild(icone);
    });
    document.body.appendChild(area);

    // ---------- 7. Barra de tarefas, menu Iniciar e relógio ----------
    var menu = criar('div', 'menu-iniciar',
        '<div class="faixa-lateral"><b>Tabuada</b> 95</div>' +
        '<ul>' +
        '<li data-acao="calcular">\uD83E\uDDEE <u>C</u>alcular tabuada</li>' +
        '<li data-acao="festa">\uD83C\uDF89 <u>M</u>odo festa</li>' +
        '<li data-acao="sobre">\u2139\uFE0F <u>S</u>obre...</li>' +
        '<li class="separador"></li>' +
        '<li data-acao="desligar">\uD83D\uDD0C <u>D</u>esligar o computador...</li>' +
        '</ul>');

    var barra = criar('div', 'barra-tarefas',
        '<button type="button" class="iniciar"><i class="logo"></i>Iniciar</button>' +
        '<span class="tarefa">\uD83E\uDDEE Tabuada</span>' +
        '<span class="bandeja">\uD83D\uDD0A <b class="relogio"></b></span>');

    document.body.appendChild(menu);
    document.body.appendChild(barra);

    var botaoIniciar = barra.querySelector('.iniciar');
    botaoIniciar.addEventListener('click', function (e) {
        e.stopPropagation();
        menu.classList.toggle('aberto');
        botaoIniciar.classList.toggle('apertado');
    });
    document.addEventListener('click', function () {
        menu.classList.remove('aberto');
        botaoIniciar.classList.remove('apertado');
    });

    menu.addEventListener('click', function (e) {
        var item = e.target.closest('li[data-acao]');
        if (!item) {
            return;
        }
        var acao = item.getAttribute('data-acao');
        if (acao === 'calcular') {
            if (campo) {
                campo.focus();
            } else {
                window.location.href = 'index.html';
            }
        } else if (acao === 'festa') {
            alternarFesta();
        } else if (acao === 'sobre') {
            alert('Tabuada 95 - versão 1.0\n\nFeito com HTML, CSS, PHP e muito amor.\n\nDica secreta: no teclado, digite \u2191 \u2191 \u2193 \u2193 \u2190 \u2192 \u2190 \u2192 B A');
        } else if (acao === 'desligar') {
            desligar();
        }
    });

    var relogio = barra.querySelector('.relogio');
    function atualizarRelogio() {
        var agora = new Date();
        var h = String(agora.getHours()).padStart(2, '0');
        var m = String(agora.getMinutes()).padStart(2, '0');
        relogio.textContent = h + ':' + m;
    }
    atualizarRelogio();
    setInterval(atualizarRelogio, 10000);

    // ---------- 8. Tela "Agora você pode desligar o computador" ----------
    function desligar() {
        var tela = criar('div', 'desligado',
            '<p>Agora você pode desligar<br>o computador com segurança.</p>' +
            '<small>(clique para ligar de novo)</small>');
        tela.addEventListener('click', function () {
            tela.remove();
        });
        document.body.appendChild(tela);
    }

    // ---------- 9. Modo festa (código Konami: ↑ ↑ ↓ ↓ ← → ← → B A) ----------
    var chuva = null;

    function alternarFesta() {
        var ligado = document.documentElement.classList.toggle('festa');
        if (ligado && !poucoMovimento) {
            var simbolos = ['\u2716', '\u2795', '\u2797', '7', '9', '42', '\u2B50', '\uD83C\uDF89', '\uD83E\uDDEE', '\uD83D\uDCAF'];
            chuva = setInterval(function () {
                var gota = criar('span', 'confete', simbolos[Math.floor(Math.random() * simbolos.length)]);
                gota.style.left = Math.random() * 100 + 'vw';
                gota.style.color = cores[Math.floor(Math.random() * cores.length)];
                gota.style.animationDuration = 2 + Math.random() * 3 + 's';
                document.body.appendChild(gota);
                setTimeout(function () {
                    gota.remove();
                }, 5000);
            }, 120);
        } else {
            clearInterval(chuva);
        }
    }

    var konami = ['ArrowUp', 'ArrowUp', 'ArrowDown', 'ArrowDown', 'ArrowLeft', 'ArrowRight', 'ArrowLeft', 'ArrowRight', 'b', 'a'];
    var posicao = 0;
    document.addEventListener('keydown', function (e) {
        var tecla = e.key.length === 1 ? e.key.toLowerCase() : e.key;
        if (tecla === konami[posicao]) {
            posicao++;
        } else if (tecla === 'ArrowUp') {
            posicao = posicao === 2 ? 2 : 1;
        } else {
            posicao = 0;
        }
        if (posicao === konami.length) {
            posicao = 0;
            alternarFesta();
        }
    });
})();
