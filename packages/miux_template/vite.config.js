import { defineConfig } from "vite"
import tailwindcss from 'tailwindcss'
import autoprefixer from "autoprefixer"
import { cpSync } from "fs"

export default defineConfig({
    // Basis-Verzeichnis für relative Pfade
    root: process.cwd(),
    build: {
        // Deaktiviert das Hashing in Dateinamen
        rollupOptions: {
            input: {
                'JavaScript/main': './Resources/Private/Assets/scripts/main.js',
                'Css/main': './Resources/Private/Assets/styles/main.scss',
                'Css/tailwind': './Resources/Private/Assets/styles/tailwind.scss',
                'Css/Backend/m_backend': './Resources/Private/Assets/Backend/m_backend.css'
            },
            output: {
                entryFileNames: '[name].js',
                assetFileNames: '[name].[ext]',
            }
        },
        // Definiert das Hauptausgabeverzeichnis
        outDir: './Resources/Public',
        // Verhindert das Leeren des Ausgabeverzeichnisses beim Build
        emptyOutDir: false,
        // Deaktiviert die Manifest-Generierung
        manifest: false,
        // Verhindert das Aufteilen in Chunks
        cssCodeSplit: true,
    },
    plugins: [
        {
            name: "copy-static-assets",
            buildEnd() {
                cpSync(
                    "Resources/Private/Assets/Icons",
                    "Resources/Public/Icons",
                    { recursive: true }
                );
                cpSync(
                    "Resources/Private/Assets/Images",
                    "Resources/Public/Images",
                    { recursive: true }
                );
                cpSync(
                    "Resources/Private/Assets/Fonts",
                    "Resources/Public/Fonts",
                    { recursive: true }
                );
            },
        },
    ],
    css: {
        postcss: {
          plugins: [
            tailwindcss({
              config: './tailwind.js' // Expliziter Pfad zur Root-Level Konfiguration
            }),
            autoprefixer()
          ]
        },
        preprocessorOptions: {
          scss: {
            // Hier könntest du globale SCSS-Variablen oder -Mixins einbinden
            // additionalData: `@import "./path/to/variables.scss";`
          }
        }
    },

    // Optimierung für die Entwicklung
    optimizeDeps: {
        include: ['tailwindcss', 'autoprefixer'],
        exclude: ['jquery'] // jQuery wird extern geladen
    }
});
