import paramiko

def run_remote_cmd(ssh, cmd):
    """Ejecuta un comando remoto a través de SSH y devuelve la salida."""
    try:
        stdin, stdout, stderr = ssh.exec_command(cmd)
        result = stdout.read().decode().strip()
        error = stderr.read().decode().strip()
        return result if result else f"Error: {error}"
    except Exception as e:
        return f"Error ejecutando el comando: {e}"

def get_remote_info(host, port, user, password):
    """Recolecta información del sistema remoto."""
    info = {}
    try:
        ssh = paramiko.SSHClient()
        ssh.set_missing_host_key_policy(paramiko.AutoAddPolicy())
        ssh.connect(hostname=host, port=port, username=user, password=password)

        info["RAM (GB)"] = run_remote_cmd(ssh, "free -g | awk '/Mem:/ {print $2}'") + " GB"
        info["CPU"] = run_remote_cmd(ssh, "nproc") + " núcleos"
        info["Procesador"] = run_remote_cmd(ssh, "grep 'model name' /proc/cpuinfo | head -n 1 | cut -d: -f2").strip()
        info["Serial"] = run_remote_cmd(ssh, "sudo dmidecode -s system-serial-number")
        info["Host"] = run_remote_cmd(ssh, "hostname")
        info["DNS"] = run_remote_cmd(ssh, "hostname -f")
        info["SO"] = run_remote_cmd(ssh, "grep '^PRETTY_NAME=' /etc/os-release | cut -d '\"' -f2")
        info["Versión SO"] = run_remote_cmd(ssh, "grep '^VERSION=' /etc/os-release | cut -d '\"' -f2")
        info["Software - Asterisk"] = run_remote_cmd(ssh, "asterisk -V")
        info["Software - MySQL/MariaDB"] = run_remote_cmd(ssh, "mysql --version")
        info["Software - Python"] = run_remote_cmd(ssh, "python3 --version")
        info["Certificado SSL"] = run_remote_cmd(ssh, "find /etc/ssl /etc/letsencrypt -name '*.crt' 2>/dev/null | head -n 3")

        ssh.close()
    except Exception as e:
        info["Error"] = f"No se pudo conectar: {e}"

    return info

def mostrar(info):
    print("📡 Información del servidor remoto:\n")
    for clave, valor in info.items():
        print(f"{clave}: {valor}")

if __name__ == "__main__":
    # 🔒 Rellena estos datos con tu servidor
    host = "10.57.251.179"
    port = 22
    user = "root"
    password = "ResItcHiNGEn@**"

    datos = get_remote_info(host, port, user, password)
    mostrar(datos)
