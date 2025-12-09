import concurrently from 'concurrently';
import chalk from 'chalk';
import open from 'open';

console.log(chalk.green(`
╔════════════════════════════════════════╗
║           ${chalk.yellow('Sellmate')} ${chalk.blue('Project')}                 ║
║     ${chalk.white('Kerja, kerja, kerja')}                      ║
╚════════════════════════════════════════╝
`));

console.log(chalk.blue(' Menyiapkan services...'));
console.log(chalk.yellow('⚡ Pastikan SQL Menyala'));
console.log(chalk.red(' Pastikan Apache Menyala'));
console.log(chalk.blue('🚀 PHP'));
console.log(chalk.green('📱 NPM\n'));

// Custom perintah untuk PHP Artisan
const phpCommand = {
    command: 'php artisan serve --port=8000 --host=127.0.0.1',  // Custom port dan host
    name: 'Backend',  // Custom nama
    prefixColor: 'blue',
    env: { NODE_ENV: 'development' },  // Custom environment
};

// Custom perintah untuk NPM
const npmCommand = {
    command: 'npm run dev -- --port=3000',  // Custom port untuk Vite/Next.js
    name: 'Frontend',  // Custom nama
    prefixColor: 'green',
    env: { 
        VITE_APP_ENV: 'local',
        VITE_APP_URL: 'http://localhost:8000'
    },  // Custom environment variables
};

// Tambahkan fungsi untuk membuka browser
const openBrowser = async (urls) => {
    console.log(chalk.yellow('\nMembuka browser...'));
    for (const url of urls) {
        await open(url);
    }
};

// Menjalankan perintah
const { result } = concurrently([
    phpCommand,
    npmCommand
], {
    prefix: 'name',
    killOthers: ['failure', 'success'],
    restartTries: 3,
    restartDelay: 3000,
    // Custom format output
    prefixFormat: chalk.gray('│') + ' {{name}}: ',
    // Custom timestamp
    timestampFormat: 'HH:mm:ss',
    // Tampilkan timestamp di setiap log
    dateFormat: 'HH:mm:ss',
    // Custom output
    outputStream: process.stdout,
    // Custom error stream
    errorStream: process.stderr,
});

// Custom handler untuk success/error
result
    .then(() => {
        console.log(chalk.green('\n┌─────────────────────────────┐'));
        console.log(chalk.green('│  ✓ Server Berjalan Normal   │'));
        console.log(chalk.green('└─────────────────────────────┘\n'));
        console.log(chalk.blue('• Backend: ') + 'http://127.0.0.1:8000');
        console.log(chalk.green('• Frontend: ') + 'http://localhost:3000\n');
        
        // Buka browser setelah server siap
        openBrowser([
            'http://localhost:3000',
            'http://localhost:8000'
        ]);
    })
    .catch(error => {
        console.log(chalk.red('\n┌─────────────────────────────┐'));
        console.log(chalk.red('│  ✗ Terjadi Kesalahan!       │'));
        console.log(chalk.red('└─────────────────────────────┘\n'));
        console.error(error);
        process.exit(1);
    });

// Custom handler untuk CTRL+C
process.on('SIGINT', () => {
    console.log(chalk.yellow('\n\nMenghentikan server...'));
    process.exit(0);
});