// npm setup yaa

import { execSync } from 'child_process';

try {
    // Install chalk terlebih dahulu
    console.log('\n🚀 Menginstall chalk...');
    execSync('npm install chalk', { stdio: 'inherit' });

     // Install open terlebih dahulu
    console.log('\n🚀 Menginstall open...');
    execSync('npm install open', { stdio: 'inherit' });
    
    // Import chalk setelah terinstall
    const chalk = (await import('chalk')).default;
    
    console.log(chalk.blue('\n🚀 Memulai setup aplikasi...\n'));

    // Menjalankan composer install
    console.log(chalk.yellow('📦 Menjalankan composer install...'));
    execSync('composer install', { stdio: 'inherit' });
    console.log(chalk.green('✅ Composer install selesai\n'));

    // Menjalankan npm install
    console.log(chalk.yellow('📦 Menjalankan npm install...'));
    execSync('npm install', { stdio: 'inherit' });
    console.log(chalk.green('✅ NPM install selesai\n'));

    // Generate application key
    console.log(chalk.yellow('🔑 Membuat application key...'));
    execSync('php artisan key:generate', { stdio: 'inherit' });
    console.log(chalk.green('✅ Application key berhasil dibuat\n'));

    // Menjalankan migrasi database
    console.log(chalk.yellow('🔄 Menjalankan migrasi database...'));
    execSync('php artisan migrate', { stdio: 'inherit' });
    console.log(chalk.green('✅ Migrasi database selesai\n'));

    // Menjalankan RegSeeder
    console.log(chalk.yellow('🔄 Menjalankan RegSeeder...'));
    execSync('php artisan db:seed', { stdio: 'inherit' });
    console.log(chalk.green('✅ RegSeeder selesai\n'));

    // Membuat symbolic link storage
    console.log(chalk.yellow('🔗 Membuat symbolic link storage...'));
    execSync('php artisan storage:link', { stdio: 'inherit' });
    console.log(chalk.green('✅ Symbolic link storage berhasil dibuat\n'));

    console.log(chalk.green('🎉 Setup aplikasi selesai!\n'));
} catch (error) {
    console.error('\n❌ Terjadi kesalahan saat setup:');
    console.error(error.message);
    process.exit(1);
}