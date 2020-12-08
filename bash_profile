# .bash_profile

# Get the aliases and functions
if [ -f ~/.bashrc ]; then
	. ~/.bashrc
fi

# User specific environment and startup programs

PATH=$PATH:$HOME/bin

export PATH
#sh .tmux.sh
tmux new-session \; source-file ~/tmux/config/tmux.startup
