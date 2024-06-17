const gulp = require("gulp");
const php = require("gulp-connect-php");
const browserSync = require("browser-sync").create();
const { exec } = require("node:child_process");
const { log } = require("node:console");

// Tâche pour démarrer le serveur PHP
gulp.task("php", (done) => {
    php.server({ base: "src", port: 8010, keepalive: true });
    done();
});

// Tâche pour démarrer BrowserSync et surveiller les fichiers
gulp.task(
    "browser-sync",
    gulp.series("php", (done) => {
        browserSync.init({
            proxy: "localhost:8010", // Proxy vers le serveur PHP
            port: 8080, // Port pour BrowserSync
            open: true,
            notify: false,
        });

        // Surveiller les fichiers et recharger le navigateur en cas de modification
        gulp.watch("src/**/*.php").on("change", browserSync.reload);
        gulp.watch("src/layout/output.css").on("change", browserSync.reload);
        done();
    }),
);

// Tâche pour surveiller les fichiers TailwindCSS
gulp.task("watch:css", (done) => {
    exec("npm run watch:css", (err, stdout, stderr) => {
        if (err) {
            console.error(`exec error: ${err}`);
            return;
        }
        console.log(`stdout: ${stdout}`);
        console.error(`stderr: ${stderr}`);
    });
    done();
});

// Tâche par défaut
gulp.task("default", gulp.parallel("browser-sync", "watch:css"));