// Inicializa el contexto de WebGL
const canvas = document.getElementById("webglCanvas");
const gl = canvas.getContext("webgl");

if (!gl) {
  alert("WebGL no está soportado en tu navegador.");
  throw new Error("WebGL no disponible");
}

// Vertex Shader
const vertexShaderSource = `
  attribute vec2 aPosition;
  attribute vec3 aColor;
  varying vec3 vColor;
  void main() {
    gl_Position = vec4(aPosition, 0.0, 1.0);
    vColor = aColor;
  }
`;

// Fragment Shader
const fragmentShaderSource = `
  precision mediump float;
  varying vec3 vColor;
  void main() {
    gl_FragColor = vec4(vColor, 1.0);
  }
`;

// Función para compilar un shader
function compileShader(source, type) {
  const shader = gl.createShader(type);
  gl.shaderSource(shader, source);
  gl.compileShader(shader);
  if (!gl.getShaderParameter(shader, gl.COMPILE_STATUS)) {
    console.error("Error compilando el shader:", gl.getShaderInfoLog(shader));
    gl.deleteShader(shader);
    throw new Error("Error en el shader");
  }
  return shader;
}

// Compilar los shaders
const vertexShader = compileShader(vertexShaderSource, gl.VERTEX_SHADER);
const fragmentShader = compileShader(fragmentShaderSource, gl.FRAGMENT_SHADER);

// Crear y enlazar el programa de WebGL
const program = gl.createProgram();
gl.attachShader(program, vertexShader);
gl.attachShader(program, fragmentShader);
gl.linkProgram(program);

if (!gl.getProgramParameter(program, gl.LINK_STATUS)) {
  console.error("Error enlazando el programa:", gl.getProgramInfoLog(program));
  throw new Error("Error en el programa");
}

gl.useProgram(program);

// Definir los vértices del cuadrado y sus colores
const vertices = new Float32Array([
  // X, Y, R, G, B
  -0.5, -0.5, 1.0, 0.0, 0.0,  // Inferior izquierdo (rojo)
   0.5, -0.5, 0.0, 1.0, 0.0,  // Inferior derecho (verde)
  -0.5,  0.5, 0.0, 0.0, 1.0,  // Superior izquierdo (azul)
   0.5,  0.5, 1.0, 1.0, 0.0   // Superior derecho (amarillo)
]);

// Crear un buffer para los vértices
const buffer = gl.createBuffer();
gl.bindBuffer(gl.ARRAY_BUFFER, buffer);
gl.bufferData(gl.ARRAY_BUFFER, vertices, gl.STATIC_DRAW);

// Configurar los atributos del shader
const aPosition = gl.getAttribLocation(program, "aPosition");
const aColor = gl.getAttribLocation(program, "aColor");

// Posiciones de los vértices
gl.vertexAttribPointer(aPosition, 2, gl.FLOAT, false, 5 * Float32Array.BYTES_PER_ELEMENT, 0);
gl.enableVertexAttribArray(aPosition);

// Colores de los vértices
gl.vertexAttribPointer(aColor, 3, gl.FLOAT, false, 5 * Float32Array.BYTES_PER_ELEMENT, 2 * Float32Array.BYTES_PER_ELEMENT);
gl.enableVertexAttribArray(aColor);

// Dibujar el cuadrado
gl.clearColor(0.0, 0.0, 0.0, 1.0);
gl.clear(gl.COLOR_BUFFER_BIT);

gl.drawArrays(gl.TRIANGLE_STRIP, 0, 4);
